<?php

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\modules\danhSachLop\models\MonHoc;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\danhSachLop\models\MonHocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Môn học';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mon-hoc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo môn học', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_mon_hoc' => [
                'attribute' => 'ma_mon_hoc',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => MonHoc::findKeyValue(['ma_mon_hoc', 'ma_mon_hoc'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã môn học'],
            ],
            'ten_mon_hoc' => [
                'attribute' => 'ten_mon_hoc',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => MonHoc::findKeyValue(['ten_mon_hoc', 'ten_mon_hoc'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Tên môn học'],
            ],
            'he_so_mon' => [
                'attribute' => 'he_so_mon',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => MonHoc::findKeyValue(['he_so_mon', 'he_so_mon'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Hệ số môn'],
            ],
            'status' => [
                'attribute' => 'status',
                'value' => function (MonHoc $model) {
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
