<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NhanVien */

$this->title = 'Tạo nhân viên';
$this->params['breadcrumbs'][] = ['label' => 'Nhân viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
