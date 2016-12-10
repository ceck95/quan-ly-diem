<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-29T11:49:37+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-29T16:27:13+07:00

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\models\PhuHuynh;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PhuHuynhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phụ huynh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phu-huynh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo phụ huynh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_phu_huynh' => [
                'attribute' => 'ma_phu_huynh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['ma_phu_huynh', 'ma_phu_huynh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã phụ huynh'],
            ],
            // 'role_id',
            'ten_phu_huynh' => [
                'attribute' => 'ten_phu_huynh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['ten_phu_huynh', 'ten_phu_huynh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã phụ huynh'],
            ],
            'gioi_tinh' => [
                'attribute' => 'gioi_tinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['gioi_tinh', 'gioi_tinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Giới tính'],
            ],
            'ngay_sinh' => [
                'attribute' => 'ngay_sinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['ngay_sinh', 'ngay_sinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Ngày sinh'],
            ],
            'dia_chi' => [
                'attribute' => 'dia_chi',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['dia_chi', 'dia_chi'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Địa chỉ'],
            ],
            // 'cmnd' => [
            //     'attribute' => 'cmnd',
            //     //                'width'      => '150px',
            //     'format' => 'raw',
            //     'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
            //     'filter' => PhuHuynh::findKeyValue(['cmnd', 'cmnd'])->toArray(),
            //     'filterInputOptions' => ['placeholder' => 'Chứng minh nhân dân'],
            // ],
            'email' => [
                'attribute' => 'email',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => PhuHuynh::findKeyValue(['email', 'email'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Email'],
            ],
            'status' => [
                'attribute' => 'status',
                'value' => function (PhuHuynh $model) {
                    return \common\utilities\Common::getStrStatus($model->status);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\utilities\Common::getStatusArr(), [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],
            // 'sdt:ntext',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
