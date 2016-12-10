<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\PhuHuynh;
use \common\modules\danhSachLop\models\Lop;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\HocSinh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoc-sinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ho_ten')->textInput() ?>

    <?= $form->field($model, 'gioi_tinh')->dropDownList(\common\utilities\Common::getGenderArr()) ?>

    <div class="input-append" style="position: relative">
        <?= $form->field($model, 'ngay_sinh')->textInput([
            'class' => 'form-control datetimepicker',
        ]) ?>
    </div>

    <?= $form->field($model, 'dan_toc')->textInput() ?>

    <?= $form->field($model, 'ton_giao')->textInput() ?>

    <?= $form->field($model, 'dia_chi')->textInput() ?>

    <?= $form->field($model, 'ma_phu_huynh')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(PhuHuynh::findAll(array('status' => STATUS_ACTIVE)), 'ma_phu_huynh', 'ten_phu_huynh'),
      'language' => 'en',
      'options' => $model->ma_phu_huynh ? [$model->ma_phu_huynh => ['Selected' => 'selected']] : ['prompt' => 'Mã phụ huynh'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <?= $form->field($model, 'ma_lop')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Lop::findAll(array('status' => STATUS_ACTIVE)), 'ma_lop', 'ten'),
      'language' => 'en',
      'options' => $model->ma_phu_huynh ? [$model->ma_phu_huynh => ['Selected' => 'selected']] : ['prompt' => 'Mã lớp'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <?= $form->field($model, 'sdt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo ' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
