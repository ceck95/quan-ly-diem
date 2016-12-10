<?php

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\modules\danhSachLop\models\HocSinh;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\danhSachLop\models\HocSinhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Học sinh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoc-sinh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo học sinh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_hoc_sinh' => [
                'attribute' => 'ma_hoc_sinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['ma_hoc_sinh', 'ma_hoc_sinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã học sinh'],
            ],
            'ho_ten' => [
                'attribute' => 'ho_ten',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['ho_ten', 'ho_ten'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Họ tên'],
            ],
            'gioi_tinh' => [
                'attribute' => 'gioi_tinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['gioi_tinh', 'gioi_tinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Giới tính'],
            ],
            'ngay_sinh:ntext',
            // 'ton_giao:ntext',
            'dia_chi' => [
                'attribute' => 'dia_chi',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['dia_chi', 'dia_chi'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Địa chỉ'],
            ],
            'ma_phu_huynh' => [
                'attribute' => 'ma_phu_huynh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['ma_phu_huynh', 'ma_phu_huynh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã phụ huynh'],
            ],
            //sdt,
            'ma_lop' => [
                'attribute' => 'ma_lop',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => HocSinh::findKeyValue(['ma_lop', 'ma_lop'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã lớp'],
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'status' => [
                'attribute' => 'status',
                'value' => function (HocSinh $model) {
                    return \common\utilities\Common::getStrStatus($model->status);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\utilities\Common::getStatusArr(), [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
