<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-29T11:49:37+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-29T13:51:57+07:00

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GiaoVien */

$this->title = 'Chỉnh sửa giáo viên: '.$model->ten_giao_vien;
$this->params['breadcrumbs'][] = ['label' => 'Giao viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ten_giao_vien, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Chỉnh sửa';
?>
<div class="giao-vien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
