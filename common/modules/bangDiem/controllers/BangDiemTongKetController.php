<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T12:34:54+07:00

namespace common\modules\bangDiem\controllers;

use Yii;
use common\modules\bangDiem\models\BangDiemTongKet;
use common\modules\bangDiem\models\BangDiemTongKetSearch;
use backend\controllers\BackendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\GiaoVien;

/**
 * BangDiemTongKetController implements the CRUD actions for BangDiemTongKet model.
 */
class BangDiemTongKetController extends BackendBaseController
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
     * Lists all BangDiemTongKet models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BangDiemTongKetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BangDiemTongKet model.
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
     * Creates a new BangDiemTongKet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BangDiemTongKet();
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';

            return \yii\widgets\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->uid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BangDiemTongKet model.
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

    public function actionTeacherStudent()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_lop_chu_nhiem'])) {
            $searchModel = new BangDiemTongKetSearch();
            $query = BangDiemTongKet::find()->andWhere(['ma_lop' => $getInfo['ma_lop_chu_nhiem']]);
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
     * Deletes an existing BangDiemTongKet model.
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
     * Finds the BangDiemTongKet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return BangDiemTongKet the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BangDiemTongKet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
