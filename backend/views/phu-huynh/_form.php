<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T14:21:11+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-26T14:23:52+07:00

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\modules\adminUser\models\Role;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\PhuHuynh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phu-huynh-form">

    <?php $form = ActiveForm::begin([
      'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'role_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Role::findAll(array('status' => STATUS_ACTIVE)), 'uid', 'name'),
      'language' => 'en',
      'options' => $model->role_id ? [$model->role_id => ['Selected' => 'selected']] : ['prompt' => 'Chức vụ'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <?= $form->field($model, 'ten_phu_huynh')->textInput() ?>

    <?= $form->field($model, 'gioi_tinh')->dropDownList(\common\utilities\Common::getGenderArr()) ?>


    <div class="input-append" style="position: relative">
        <?= $form->field($model, 'ngay_sinh')->textInput([
            'class' => 'form-control datetimepicker',
        ]) ?>
    </div>

    <?= $form->field($model, 'dia_chi')->textInput() ?>

    <?= $form->field($model, 'cmnd')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'sdt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
