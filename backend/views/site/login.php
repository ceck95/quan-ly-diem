<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T15:59:08+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-03T08:10:39+07:00

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\ActiveForm;

$this->title = 'Quản lý điểm - Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid">
    <h1>
        <span class="white"><?= Yii::t('app', 'Đăng nhập') ?></span>
    </h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'phoneNumber')->textInput(['placeholder' => 'Phone number']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
    <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Remember Me']); ?>

    <button type="submit" class="btn btn-primary">Login</button>
    <?php ActiveForm::end(); ?>
</div>
