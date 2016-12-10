<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\HocSinh */

$this->title = 'Chỉnh sửa: '.$model->ho_ten;
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="hoc-sinh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
