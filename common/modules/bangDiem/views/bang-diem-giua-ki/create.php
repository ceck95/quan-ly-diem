<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-27T14:22:55+07:00

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemGiuaKi */

$this->title = 'Tạo bảng điểm giữa kì';
$this->params['breadcrumbs'][] = ['label' => 'Bảng điểm giữa kì', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-giua-ki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
