<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVien */

$this->title = 'Chỉnh sửa nhân viên: '.$model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Nhân viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="nhan-vien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search', [
        'model' => $model,
    ]) ?>

</div>
