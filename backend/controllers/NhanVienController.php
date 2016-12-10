<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-25T09:48:03+07:00

namespace backend\controllers;

use Yii;
use common\models\NhanVien;
use common\models\NhanVienSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\business\BusinessAddUser;

/**
 * NhanVienController implements the CRUD actions for NhanVien model.
 */
class NhanVienController extends BackendBaseController
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
        $this->category = 'nhanVien';
    }

    public function actionIndex()
    {
        $searchModel = new NhanVienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NhanVien model.
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
     * Creates a new NhanVien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NhanVien();

        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post();
            $dataUser = [
                'User' => [
                 'role_id' => $postData['NhanVien']['role_id'],
                 'email' => $postData['NhanVien']['email'],
                 'username' => $postData['NhanVien']['sdt'],
                 'dob' => $postData['NhanVien']['ngay_sinh'],
                 'fullname' => $postData['NhanVien']['ten_nhan_vien'],
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

    /**
     * Updates an existing NhanVien model.
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
     * Deletes an existing NhanVien model.
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
     * Finds the NhanVien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return NhanVien the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NhanVien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
