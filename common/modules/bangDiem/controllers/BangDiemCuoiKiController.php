<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:46:22+07:00

namespace common\modules\bangDiem\controllers;

use Yii;
use common\modules\bangDiem\models\BangDiemCuoiKi;
use common\modules\bangDiem\models\BangDiemGiuaKi;
use common\modules\bangDiem\models\BangDiemCuoiKiSearch;
use common\modules\bangDiem\business\BusinessCalculateScore;
use backend\controllers\BackendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\GiaoVien;

/**
 * BangDiemCuoiKiController implements the CRUD actions for BangDiemCuoiKi model.
 */
class BangDiemCuoiKiController extends BackendBaseController
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
     * Lists all BangDiemCuoiKi models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BangDiemCuoiKiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BangDiemCuoiKi model.
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

    public function actionTeacherStudent()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_lop_chu_nhiem'])) {
            $searchModel = new BangDiemCuoiKiSearch();
            $query = BangDiemCuoiKi::find()->andWhere(['ma_lop' => $getInfo['ma_lop_chu_nhiem']]);
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
            $searchModel = new BangDiemCuoiKiSearch();
            $maMon = json_decode($getInfo['ma_mon_giang_day'], true);
            $maLop = json_decode($getInfo['ma_lop_giang_day'], true);
            $query = BangDiemCuoiKi::find()->andWhere(['in', 'ma_mon', $maMon])->andWhere(['in', 'ma_lop', $maLop]);
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
     * Creates a new BangDiemCuoiKi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BangDiemCuoiKi();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        $dataPost = Yii::$app->request->post();
        if ($dataPost) {
            $data['ma_mon'] = $dataPost['BangDiemCuoiKi']['ma_mon'];
            $data['ma_hoc_sinh'] = $dataPost['BangDiemCuoiKi']['ma_hoc_sinh'];
            $data['ma_lop'] = $dataPost['BangDiemCuoiKi']['ma_lop'];
            $data['kiem_tra_mieng'] = $dataPost['BangDiemCuoiKi']['kiem_tra_mieng'];
            $data['kiem_tra_15_phut'] = $dataPost['BangDiemCuoiKi']['kiem_tra_15_phut'];
            $data['kiem_tra_1_tiet'] = $dataPost['BangDiemCuoiKi']['kiem_tra_1_tiet'];
            $data['thi'] = $dataPost['BangDiemCuoiKi']['thi'];
            $checkMidtermPoint = BangDiemGiuaKi::find()->andWhere(['ma_hoc_sinh' => $dataPost['BangDiemCuoiKi']['ma_hoc_sinh'], 'ma_lop' => $dataPost['BangDiemCuoiKi']['ma_lop'], 'ma_mon' => $dataPost['BangDiemCuoiKi']['ma_mon']])->asArray()->one();
            if (isset($checkMidtermPoint)) {
                $diemTrungBinh = $this->business->calculateScoreCreate($model, $data);
                $dataPost['BangDiemCuoiKi']['diem_trung_binh'] = $diemTrungBinh;
                $nameData = $this->business->getName($data['ma_hoc_sinh'], $data['ma_mon'], $data['ma_lop']);
                $dataPost['BangDiemCuoiKi']['ten_hoc_sinh'] = $nameData['ten_hoc_sinh'];
                $dataPost['BangDiemCuoiKi']['ten_lop'] = $nameData['ten_lop'];
                $dataPost['BangDiemCuoiKi']['ten_mon'] = $nameData['ten_mon'];
                $model->load($dataPost);
                $model->save();

                return $this->redirect(['view', 'id' => $model->uid]);
            } else {
                flassError("Don't exist mid-term point");

                return $this->render('create', [
                  'model' => $model,
              ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BangDiemCuoiKi model.
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
     * Deletes an existing BangDiemCuoiKi model.
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
     * Finds the BangDiemCuoiKi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return BangDiemCuoiKi the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BangDiemCuoiKi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
