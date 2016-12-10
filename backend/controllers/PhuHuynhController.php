<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T22:24:05+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T10:11:46+07:00

namespace backend\controllers;

use Yii;
use common\models\PhuHuynh;
use common\modules\adminUser\models\User;
use common\modules\danhSachLop\models\HocSinh;
use common\modules\bangDiem\models\BangDiemGiuaKi;
use common\modules\bangDiem\models\BangDiemCuoiKi;
use common\modules\bangDiem\models\BangDiemRenLuyen;
use common\modules\bangDiem\models\BangDiemTongKet;
use common\models\PhuHuynhSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\business\BusinessAddUser;

/**
 * PhuHuynhController implements the CRUD actions for PhuHuynh model.
 */
class PhuHuynhController extends BackendBaseController
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
        $this->business = BusinessAddUser::getInstance();
        $this->category = 'phuHuynh';
    }

    /**
     * Lists all PhuHuynh models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhuHuynhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhuHuynh model.
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
     * Creates a new PhuHuynh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhuHuynh();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post();
            $dataUser = [
                'User' => [
                 'role_id' => $postData['PhuHuynh']['role_id'],
                 'email' => $postData['PhuHuynh']['email'],
                 'username' => $postData['PhuHuynh']['sdt'],
                 'dob' => $postData['PhuHuynh']['ngay_sinh'],
                 'fullname' => $postData['PhuHuynh']['ten_phu_huynh'],
                 'password_hash' => self::PASSWORD_DEFAULT,
                 'password_hash_repeat' => self::PASSWORD_DEFAULT,
                 'status' => STATUS_ACTIVE,
               ],
            ];
            $addUser = $this->business->addUser($dataUser);
            if ($addUser) {
                $model->save();

                return $this->redirect(['view', 'id' => $model->uid]);
            } else {
                flassError('User existed');

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

    public function actionViewScoreByStudent()
    {
        $getInfo = PhuHuynh::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        $infoStudent = HocSinh::find()->andWhere(['ma_phu_huynh' => $getInfo['ma_phu_huynh']])->asArray()->one();
        if (isset($infoStudent)) {
            $midTermPoint = BangDiemGiuaKi::find()->andWhere(['ma_hoc_sinh' => $infoStudent['ma_hoc_sinh'], 'ma_lop' => $infoStudent['ma_lop']])->all();
            $lastPoint = BangDiemCuoiKi::find()->andWhere(['ma_hoc_sinh' => $infoStudent['ma_hoc_sinh'], 'ma_lop' => $infoStudent['ma_lop']])->all();
            $forgePoint = BangDiemRenLuyen::find()->andWhere(['ma_hoc_sinh' => $infoStudent['ma_hoc_sinh'], 'ma_lop' => $infoStudent['ma_lop']])->one();
            $finalPoint = BangDiemTongKet::find()->andWhere(['ma_hoc_sinh' => $infoStudent['ma_hoc_sinh'], 'ma_lop' => $infoStudent['ma_lop']])->one();

            return $this->render('student', [
              'midTermPoint' => $midTermPoint,
              'lastPoint' => $lastPoint,
              'forgePoint' => $forgePoint,
              'finalPoint' => $finalPoint,
          ]);
        } else {
            flassError("Don't exist student");

            return $this->goHome();
        }
    }

    /**
     * Updates an existing PhuHuynh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->uid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhuHuynh model.
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
     * Finds the PhuHuynh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return PhuHuynh the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PhuHuynh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
