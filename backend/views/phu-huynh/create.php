<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhuHuynh */

$this->title = 'Tạo phụ huynh';
$this->params['breadcrumbs'][] = ['label' => 'Phụ huynh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phu-huynh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
