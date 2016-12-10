<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PhuHuynh */

$this->title = $model->ten_phu_huynh;
$this->params['breadcrumbs'][] = ['label' => 'Phụ huynh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phu-huynh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->uid], [
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
            'ma_phu_huynh:ntext',
            'role_id',
            'ten_phu_huynh:ntext',
            'gioi_tinh:ntext',
            'ngay_sinh:ntext',
            'dia_chi:ntext',
            'cmnd',
            'email:ntext',
            'status',
            'sdt:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
