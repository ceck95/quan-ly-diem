<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\User;

/**
 * Site controller.
 */
class SiteController extends BackendBaseController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        return $this->render('index');
    }

    public function actionProfile()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } else {
            $model = adminuser();

            return $this->render('profile', [
          'model' => $model,
        ]);
        }
    }

    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (adminuser()->status == STATUS_HIDE) {
                Yii::$app->session->setFlash('error', 'You are not active.');

                return $this->redirect(['site/login']);
            } else {
                return $this->goBack();
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
