<?php

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\modules\danhSachLop\models\Lop;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\danhSachLop\models\LopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lớp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo lớp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_lop' => [
                'attribute' => 'ma_lop',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => Lop::findKeyValue(['ma_lop', 'ma_lop'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã lớp'],
            ],
            'ten' => [
                'attribute' => 'ten',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => Lop::findKeyValue(['ten', 'ten'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Tên Lớp'],
            ],
            'so_hoc_sinh',
            'khoi' => [
                'attribute' => 'khoi',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => Lop::findKeyValue(['khoi', 'khoi'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Khối'],
            ],
            'status' => [
                'attribute' => 'status',
                'value' => function (Lop $model) {
                    return \common\utilities\Common::getStrStatus($model->status);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\utilities\Common::getStatusArr(), [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
