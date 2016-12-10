<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-01T00:00:56+07:00

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\modules\danhSachLop\models\Lop;
use \yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemRenLuyen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bang-diem-ren-luyen-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'ma_lop')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Lop::findAll(array('status' => STATUS_ACTIVE)), 'ma_lop', 'ten'),
      'language' => 'en',
      'options' => $model->ma_lop ? [$model->ma_lop => ['Selected' => 'selected']] : ['prompt' => 'Mã lớp'],
      'pluginOptions' => [
        'allowClear' => true,
      ],
    ]) ?>
    <?= $form->field($model, 'ma_hoc_sinh')->widget(DepDrop::classname(), [
        'options' => $model->ma_hoc_sinh ? [$model->ma_hoc_sinh => ['Selected' => 'selected']] : ['prompt' => 'Mã học sinh'],
        'type' => DepDrop::TYPE_SELECT2,
        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
        'pluginOptions' => [
            'depends' => ['bangdiemrenluyen-ma_lop'],
            'url' => Url::to(['/danhSachLop/hoc-sinh/list-hs-by-lop']),
            'loadingText' => 'Loading ...',
        ],
    ]); ?>

    <?= $form->field($model, 'diem_ren_luyen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Chỉnh sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
