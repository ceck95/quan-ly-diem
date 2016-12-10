<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:53:09+07:00

namespace common\modules\bangDiem\controllers;

use Yii;
use common\modules\bangDiem\models\BangDiemRenLuyen;
use common\modules\bangDiem\models\BangDiemCuoiKi;
use common\modules\danhSachLop\models\MonHoc;
use common\modules\bangDiem\models\BangDiemRenLuyenSearch;
use backend\controllers\BackendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\modules\bangDiem\business\BusinessCalculateScore;
use common\models\GiaoVien;

/**
 * BangDiemRenLuyenController implements the CRUD actions for BangDiemRenLuyen model.
 */
class BangDiemRenLuyenController extends BackendBaseController
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

    /**
     * Lists all BangDiemRenLuyen models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BangDiemRenLuyenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BangDiemRenLuyen model.
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

    protected $business;

    public function init()
    {
        $this->business = BusinessCalculateScore::getInstance();
        $this->category = 'bangDiem';

        parent::init();
    }

    /**
     * Creates a new BangDiemRenLuyen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function loaiHanhKiem($diem)
    {
        if ($diem > 80) {
            $loaiHanhKiem = 'Tốt';
        } elseif ($diem <= 80 && $diem >= 61) {
            $loaiHanhKiem = 'Khá';
        } elseif ($diem <= 60 && $diem >= 50) {
            $loaiHanhKiem = 'Trung bình';
        } else {
            $loaiHanhKiem = 'Yếu';
        }

        return $loaiHanhKiem;
    }

    public function actionTeacherStudent()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_lop_chu_nhiem'])) {
            $searchModel = new BangDiemRenLuyenSearch();
            $query = BangDiemRenLuyen::find()->andWhere(['ma_lop' => $getInfo['ma_lop_chu_nhiem']]);
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

    public function actionCreate()
    {
        $model = new BangDiemRenLuyen();
        $dataPost = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($dataPost) {
            $monHoc = MonHoc::find()->asArray()->all();
            $midTermPoint = BangDiemCuoiKi::find()->andWhere(['ma_hoc_sinh' => $dataPost['BangDiemRenLuyen']['ma_hoc_sinh'], 'ma_lop' => $dataPost['BangDiemRenLuyen']['ma_lop']])->asArray()->all();
            if (count($monHoc) == count($midTermPoint)) {
                $dataBusiness['ma_lop'] = $dataPost['BangDiemRenLuyen']['ma_lop'];
                $dataBusiness['ma_hoc_sinh'] = $dataPost['BangDiemRenLuyen']['ma_hoc_sinh'];
                $dataPost['BangDiemRenLuyen']['loai_hanh_kiem'] = $this->loaiHanhKiem($dataPost['BangDiemRenLuyen']['diem_ren_luyen']);
                $insertMediumFinal = $this->business->insertFinalPoint($dataBusiness, $dataPost['BangDiemRenLuyen']['loai_hanh_kiem']);
                if ($insertMediumFinal) {
                    $nameData = $this->business->getNameTwo($dataBusiness['ma_hoc_sinh'], $dataBusiness['ma_lop']);
                    $dataPost['BangDiemRenLuyen']['ten_hoc_sinh'] = $nameData['ten_hoc_sinh'];
                    $dataPost['BangDiemRenLuyen']['ten_lop'] = $nameData['ten_lop'];
                    $model->load($dataPost);
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->uid]);
                } else {
                    flassError('Insert forge error');

                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            } else {
                flassError("Don't exits subject point all");

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
     * Updates an existing BangDiemRenLuyen model.
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
            $dataPost['BangDiemRenLuyen']['loai_hanh_kiem'] = $this->loaiHanhKiem($dataPost['BangDiemRenLuyen']['diem_ren_luyen']);
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
     * Deletes an existing BangDiemRenLuyen model.
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
     * Finds the BangDiemRenLuyen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return BangDiemRenLuyen the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BangDiemRenLuyen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
