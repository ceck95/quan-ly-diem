<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T09:37:17+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T12:23:35+07:00

namespace common\modules\danhSachLop\controllers;

use Yii;
use common\modules\danhSachLop\models\HocSinh;
use common\models\GiaoVien;
use common\modules\danhSachLop\models\Lop;
use common\modules\danhSachLop\models\HocSinhSearch;
use backend\controllers\BackendBaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * HocSinhController implements the CRUD actions for HocSinh model.
 */
class HocSinhController extends BackendBaseController
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
     * Lists all HocSinh models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HocSinhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStudent()
    {
        $getInfo = GiaoVien::find()->andWhere(['sdt' => adminuser()->username])->asArray()->one();
        if (isset($getInfo) && isset($getInfo['ma_lop_chu_nhiem'])) {
            $searchModel = new HocSinhSearch();
            $query = HocSinh::find()->andWhere(['ma_lop' => $getInfo['ma_lop_chu_nhiem']]);
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

    public function actionListHsByLop()
    {
        $dataPost = Yii::$app->request->post();
        if ($dataPost) {
            $list = HocSinh::find()->andWhere(['ma_lop' => $dataPost['depdrop_parents']['0']])->all();
            if (count($list) > 0) {
                $selected = '';
                foreach ($list as $key => $value) {
                    $out[] = ['id' => $value['ma_hoc_sinh'], 'name' => $value['ho_ten']];
                }

                return Json::encode(['output' => $out, 'selected' => '']);
            }

            return Json::encode(['output' => '', 'selected' => '']);
        }
    }

    /**
     * Displays a single HocSinh model.
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
     * Creates a new HocSinh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HocSinh();
        $postData = Yii::$app->request->post();
        if ($postData) {
            $maLop = $postData['HocSinh']['ma_lop'];
            if (isset($maLop)) {
                $data = HocSinh::find()->select(['COUNT(*) AS so_hoc_sinh'])->andWhere(['ma_lop' => $maLop])->asArray()->all();
                $soHocSinh = $data['0']['so_hoc_sinh'];
                ++$soHocSinh;
                $modelLop = Lop::find()->andWhere(['ma_lop' => $maLop])->one();
                $dataPostLop['Lop']['so_hoc_sinh'] = $soHocSinh;
                $modelLop->load($dataPostLop);
                $modelLop->save();
                $model->load($postData);
                $model->save();

                return $this->redirect(['view', 'id' => $model->uid]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HocSinh model.
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
     * Deletes an existing HocSinh model.
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
     * Finds the HocSinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return HocSinh the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HocSinh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
