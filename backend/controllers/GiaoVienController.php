<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T15:28:37+07:00

namespace backend\controllers;

use Yii;
use common\models\GiaoVien;
use common\models\GiaoVienSearch;
use yii\web\NotFoundHttpException;
use backend\business\BusinessAddUser;
use yii\filters\VerbFilter;

/**
 * GiaoVienController implements the CRUD actions for GiaoVien model.
 */
class GiaoVienController extends BackendBaseController
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
     * Lists all GiaoVien models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GiaoVienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    protected $business;

    public function init()
    {
        $this->business = BusinessAddUser::getInstance();
        $this->category = 'giaoVien';
    }

    /**
     * Displays a single GiaoVien model.
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
     * Creates a new GiaoVien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GiaoVien();
        $postData = Yii::$app->request->post();
        if ($postData) {
            $maGiaoVien = $postData['GiaoVien']['ma_lop_giang_day'];
            $postData['GiaoVien']['ma_lop_giang_day'] = \common\utilities\Common::toPgArray($maGiaoVien);
            $postData['GiaoVien']['ma_mon_giang_day'] = \common\utilities\Common::toPgArray($postData['GiaoVien']['ma_mon_giang_day']);
            $dataUser = [
                'User' => [
                 'role_id' => $postData['GiaoVien']['role_id'],
                 'email' => $postData['GiaoVien']['email'],
                 'username' => $postData['GiaoVien']['sdt'],
                 'dob' => $postData['GiaoVien']['ngay_sinh'],
                 'fullname' => $postData['GiaoVien']['ten_giao_vien'],
                 'password_hash' => self::PASSWORD_DEFAULT,
                 'password_hash_repeat' => self::PASSWORD_DEFAULT,
                 'status' => STATUS_ACTIVE,
               ],
            ];
            $addUser = $this->business->addUser($dataUser);
            $model->load($postData);
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
     * Updates an existing GiaoVien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $postData = Yii::$app->request->post();
        if ($postData) {
            $maGiaoVien = $postData['GiaoVien']['ma_lop_giang_day'];
            $postData['GiaoVien']['ma_lop_giang_day'] = json_encode($maGiaoVien);
            $postData['GiaoVien']['ma_mon_giang_day'] = json_encode($postData['GiaoVien']['ma_mon_giang_day']);
            $model->load($postData);
            $model->save();

            return $this->redirect(['view', 'id' => $model->uid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GiaoVien model.
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
     * Finds the GiaoVien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return GiaoVien the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GiaoVien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
