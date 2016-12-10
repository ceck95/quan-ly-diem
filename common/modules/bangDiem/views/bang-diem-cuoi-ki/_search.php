<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemCuoiKiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bang-diem-cuoi-ki-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'ma_hoc_sinh') ?>

    <?= $form->field($model, 'ma_lop') ?>

    <?= $form->field($model, 'kiem_tra_mieng') ?>

    <?= $form->field($model, 'kiem_tra_15_phut') ?>

    <?php // echo $form->field($model, 'kiem_tra_1_tiet') ?>

    <?php // echo $form->field($model, 'thi') ?>

    <?php // echo $form->field($model, 'diem_trung_binh') ?>

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
