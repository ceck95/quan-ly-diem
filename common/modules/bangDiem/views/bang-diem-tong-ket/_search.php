<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemTongKetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bang-diem-tong-ket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'ma_hoc_sinh') ?>

    <?= $form->field($model, 'ma_lop') ?>

    <?= $form->field($model, 'diem_trung_binh_hk1') ?>

    <?= $form->field($model, 'diem_trung_binh_hk2') ?>

    <?php // echo $form->field($model, 'diem_trung_binh_ca_nam') ?>

    <?php // echo $form->field($model, 'loai_hanh_kiem') ?>

    <?php // echo $form->field($model, 'xep_loai') ?>

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
