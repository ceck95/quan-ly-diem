<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\MonHoc */

$this->title = 'Update Mon Hoc: ' . $model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Mon Hocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mon-hoc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
