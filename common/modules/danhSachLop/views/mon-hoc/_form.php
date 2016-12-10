<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\MonHoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mon-hoc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_mon_hoc')->textInput() ?>

    <?= $form->field($model, 'he_so_mon')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
