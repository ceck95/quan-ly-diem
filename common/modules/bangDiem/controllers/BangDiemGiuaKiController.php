<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:48:45+07:00

namespace common\modules\bangDiem\controllers;

use Yii;
use common\modules\bangDiem\models\BangDiemGiuaKi;
use common\modules\bangDiem\business\BusinessCalculateScore;
use common\modules\bangDiem\models\BangDiemGiuaKiSearch;
use backend\controllers\BackendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\GiaoVien;

/**
 * BangDiemGiuaKiController implements the CRUD actions for BangDiemGiuaKi model.
 */
class BangDiemGiuaKiController extends BackendBaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    protected $business;

    public function init()
    {
        $this->business = BusinessCalculateScore::getInstance();
        $this->category = 'bangDiem';

        parent::init();
    }

    /**
     * Lists all BangDiemGiuaKi models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BangDiemGiuaKiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTeacherStudent()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_lop_chu_nhiem'])) {
            $searchModel = new BangDiemGiuaKiSearch();
            $query = BangDiemGiuaKi::find()->andWhere(['ma_lop' => $getInfo['ma_lop_chu_nhiem']]);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

            return $this->render('student', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            flassError("Don't exist teacher");

            return $this->goHome();
        }
    }

    public function actionTeacherStudentSubject()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_mon_giang_day']) || isset($getInfo['ma_lop_giang_day'])) {
            $searchModel = new BangDiemGiuaKiSearch();
            $maMon = json_decode($getInfo['ma_mon_giang_day'], true);
            $maLop = json_decode($getInfo['ma_lop_giang_day'], true);
            $query = BangDiemGiuaKi::find()->andWhere(['in', 'ma_mon', $maMon])->andWhere(['in', 'ma_lop', $maLop]);
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $query);

            return $this->render('student', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            flassError("Don't exist teacher");

            return $this->goHome();
        }
    }

    /**
     * Displays a single BangDiemGiuaKi model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BangDiemGiuaKi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BangDiemGiuaKi();
        $dataPost = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($dataPost) {
            $data['ma_mon'] = $dataPost['BangDiemGiuaKi']['ma_mon'];
            $data['ma_hoc_sinh'] = $dataPost['BangDiemGiuaKi']['ma_hoc_sinh'];
            $data['ma_lop'] = $dataPost['BangDiemGiuaKi']['ma_lop'];
            $data['kiem_tra_mieng'] = $dataPost['BangDiemGiuaKi']['kiem_tra_mieng'];
            $data['kiem_tra_15_phut'] = $dataPost['BangDiemGiuaKi']['kiem_tra_15_phut'];
            $data['kiem_tra_1_tiet'] = $dataPost['BangDiemGiuaKi']['kiem_tra_1_tiet'];
            $data['thi'] = $dataPost['BangDiemGiuaKi']['thi'];
            $nameData = $this->business->getName($data['ma_hoc_sinh'], $data['ma_mon'], $data['ma_lop']);
            $dataPost['BangDiemGiuaKi']['ten_hoc_sinh'] = $nameData['ten_hoc_sinh'];
            $dataPost['BangDiemGiuaKi']['ten_lop'] = $nameData['ten_lop'];
            $dataPost['BangDiemGiuaKi']['ten_mon'] = $nameData['ten_mon'];
            $diemTrungBinh = $this->business->calculateScoreCreate($model, $data);
            $dataPost['BangDiemGiuaKi']['diem_trung_binh'] = $diemTrungBinh;
            $model->load($dataPost);
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->uid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BangDiemGiuaKi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dataPost = Yii::$app->request->post();
        if ($dataPost) {
            $data['kiem_tra_mieng'] = $dataPost['BangDiemGiuaKi']['kiem_tra_mieng'];
            $data['kiem_tra_15_phut'] = $dataPost['BangDiemGiuaKi']['kiem_tra_15_phut'];
            $data['kiem_tra_1_tiet'] = $dataPost['BangDiemGiuaKi']['kiem_tra_1_tiet'];
            $data['thi'] = $dataPost['BangDiemGiuaKi']['thi'];
            $diemTrungBinh = $this->business->calculateScore($data);
            $dataPost['BangDiemGiuaKi']['diem_trung_binh'] = $diemTrungBinh;
            $model->load($dataPost);
            $model->save();

            return $this->redirect(['view', 'id' => $model->uid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BangDiemGiuaKi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BangDiemGiuaKi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return BangDiemGiuaKi the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BangDiemGiuaKi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
