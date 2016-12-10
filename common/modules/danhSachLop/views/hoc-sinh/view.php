<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\HocSinh */

$this->title = $model->ho_ten;
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoc-sinh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'uid',
            'ma_hoc_sinh:ntext',
            'ho_ten:ntext',
            'gioi_tinh:ntext',
            'ngay_sinh:ntext',
            'dan_toc:ntext',
            'ton_giao:ntext',
            'dia_chi:ntext',
            'ma_phu_huynh:ntext',
            'sdt:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'status',
        ],
    ]) ?>

</div>
