<?php

use yii\helpers\Html;
use common\modules\adminUser\models\Role;
use common\modules\file\widgets\FileUploadWidget;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DateTimePicker;
use common\core\web\mvc\form\NexxActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\adminUser\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = NexxActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data'],
      'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'email')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'username')->textInput(['rows' => 6]) ?>

    <?= FileUploadWidget::widget([
        'form' => $form,
        'sourceModel' => $model,
        'attr' => 'avatar',
        'options' => [
            'accept' => 'image/*',
        ],
    ]) ?>

    <?= $form->field($model, 'position')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'role_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Role::find()->all(), 'uid', 'name'),
      'language' => 'en',
      'options' => $model->role_id ? [$model->role_id => ['Selected' => 'selected']] : ['prompt' => 'Select role'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <div class="input-append" style="position: relative">
        <?= $form->field($model, 'dob')->textInput([
            'class' => 'form-control datetimepicker',
            'pluginOptions' => [
                'format' => 'd-M-Y g:i A',
                'todayHighlight' => true,
            ],
        ]) ?>
    </div>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fullname')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['rows' => 6, 'value' => '']) ?>

    <?= $form->field($model, 'password_hash_repeat')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\utilities\Common::getStatusArr()) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php NexxActiveForm::end(); ?>

</div>
