<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T22:18:44+07:00

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\modules\adminUser\models\Role;
use \common\modules\danhSachLop\models\Lop;
use \common\modules\danhSachLop\models\MonHoc;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\GiaoVien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="giao-vien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Role::findAll(array('status' => STATUS_ACTIVE)), 'uid', 'name'),
      'language' => 'en',
      'options' => $model->role_id ? [$model->role_id => ['Selected' => 'selected']] : ['prompt' => 'Chức vụ'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <?= $form->field($model, 'ten_giao_vien')->textInput() ?>

    <?= $form->field($model, 'gioi_tinh')->dropDownList(\common\utilities\Common::getGenderArr()) ?>

    <?= $form->field($model, 'sdt')->textInput() ?>

    <div class="input-append" style="position: relative">
        <?= $form->field($model, 'ngay_sinh')->textInput([
            'class' => 'form-control datetimepicker',
        ]) ?>
    </div>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'ma_lop_giang_day')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Lop::findAll(array('status' => STATUS_ACTIVE)), 'ma_lop', 'ten'),
      'language' => 'en',
      'options' => ['prompt' => 'Mã lớp chủ nhiệm', 'multiple' => true],
      'pluginOptions' => [
          'tags' => true,
          'maximumInputLength' => 10,
      ],
    ]) ?>

    <?= $form->field($model, 'ma_mon_giang_day')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(MonHoc::findAll(array('status' => STATUS_ACTIVE)), 'ma_mon_hoc', 'ten_mon_hoc'),
      'language' => 'en',
      'options' => ['prompt' => 'Mã môn giảng dạy', 'multiple' => true],
      'pluginOptions' => [
          'tags' => true,
          'maximumInputLength' => 10,
      ],
    ]) ?>

    <?= $form->field($model, 'ma_lop_chu_nhiem')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Lop::findAll(array('status' => STATUS_ACTIVE)), 'ma_lop', 'ten'),
      'language' => 'en',
      'options' => $model->ma_lop_chu_nhiem ? [$model->ma_lop_chu_nhiem => ['Selected' => 'selected']] : ['prompt' => 'Mã lớp chủ nhiệm'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
