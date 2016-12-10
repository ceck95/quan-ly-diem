<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GiaoVienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="giao-vien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'ma_giao_vien') ?>

    <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'ten_giao_vien') ?>

    <?= $form->field($model, 'gioi_tinh') ?>

    <?php // echo $form->field($model, 'sdt') ?>

    <?php // echo $form->field($model, 'ma_lop_giang_day') ?>

    <?php // echo $form->field($model, 'ma_lop_chu_nhiem') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
