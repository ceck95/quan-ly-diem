<?php

namespace common\modules\adminUser\controllers;

use backend\controllers\BackendBaseController;
use common\modules\adminUser\models\UserSearch;
use Yii;
use common\modules\adminUser\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\modules\adminUser\business\BusinessAdminUser;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BackendBaseController
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
     * Lists all User models.
     *
     * @return mixed
     */
    protected $business;

    public function init()
    {
        $this->business = BusinessAdminUser::getInstance();
        $this->category = 'adminUser';

        parent::init();
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'create';
        $data = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($data) {
            pd($data);
        }
        if ($data) {
            $model->load($data);
            $model->setPassword($data['User']['password_hash']);
            $data = UploadedFile::getInstances($model, 'avatar');
            if ($data) {
                $model->avatar = $model->uploadfile($model->avatar, 'avatar_user_');
            }
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

     /**
      * Updates an existing User model.
      * If update is successful, the browser will be redirected to the 'view' page.
      *
      * @param int $id
      *
      * @return mixed
      */
     public function actionChangePassword()
     {
         $model = adminuser();
         if ($data = Yii::$app->request->post()) {
             if (!$data['User']['password_hash']) {
                 Yii::$app->session->setFlash('error', 'Change password fail');

                 return $this->redirect(['/site/profile']);
             } else {
                 //  $model->username = 'nhutuit';
          //  $model->password_hash = 'a';
          //  pd($model);
           $model->setPassword($data['User']['password_hash']);
                 if ($model->save(false)) {
                     Yii::$app->session->setFlash('success', 'Change password success');

                     return $this->redirect(['/site/profile']);
                 }
             }
         }
     }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->password_hash) {
                $model->setPassword($data['User']['password_hash']);
            }
            $data = UploadedFile::getInstances($model, 'avatar');
            if ($data) {
                $model->avatar = $model->uploadfile($data, 'avatar_user_');
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return User the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
