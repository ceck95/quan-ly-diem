<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemTongKet */

$this->title = $model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Bang Diem Tong Kets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-tong-ket-view">

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
            'ma_lop:ntext',
            'diem_trung_binh_hk1',
            'diem_trung_binh_hk2',
            'diem_trung_binh_ca_nam',
            'loai_hanh_kiem:ntext',
            'xep_loai:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'status',
        ],
    ]) ?>

</div>
