<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\HocSinhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoc-sinh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'ma_hoc_sinh') ?>

    <?= $form->field($model, 'ho_ten') ?>

    <?= $form->field($model, 'gioi_tinh') ?>

    <?= $form->field($model, 'ngay_sinh') ?>

    <?php // echo $form->field($model, 'dan_toc') ?>

    <?php // echo $form->field($model, 'ton_giao') ?>

    <?php // echo $form->field($model, 'dia_chi') ?>

    <?php // echo $form->field($model, 'ma_phu_huynh') ?>

    <?php // echo $form->field($model, 'sdt') ?>

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
