<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemTongKet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bang-diem-tong-ket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_hoc_sinh')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ma_lop')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diem_trung_binh_hk1')->textInput() ?>

    <?= $form->field($model, 'diem_trung_binh_hk2')->textInput() ?>

    <?= $form->field($model, 'diem_trung_binh_ca_nam')->textInput() ?>

    <?= $form->field($model, 'loai_hanh_kiem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'xep_loai')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
