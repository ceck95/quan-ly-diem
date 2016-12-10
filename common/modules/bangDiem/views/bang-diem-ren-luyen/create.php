<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-27T14:38:20+07:00

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemRenLuyen */

$this->title = 'Tạo bảng điểm rèn luyện';
$this->params['breadcrumbs'][] = ['label' => 'Bảng điểm rèn luyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-ren-luyen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
