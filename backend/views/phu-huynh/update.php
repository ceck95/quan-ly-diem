<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhuHuynh */

$this->title = 'Chỉnh sửa phụ huynh: '.$model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Phụ huynh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="phu-huynh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
