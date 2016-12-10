<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\MonHoc */

$this->title = 'Tạo môn học';
$this->params['breadcrumbs'][] = ['label' => 'Môn học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mon-hoc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
