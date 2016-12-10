<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\Lop */

$this->title = 'Chỉnh sửa lớp: '.$model->ten;
$this->params['breadcrumbs'][] = ['label' => 'Lớp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="lop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
