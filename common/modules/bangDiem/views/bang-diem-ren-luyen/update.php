<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-28T15:50:58+07:00

use yii\helpers\Html;
use common\modules\danhSachLop\models\HocSinh;

$dataHocSinh = HocSinh::find()->andWhere(['ma_hoc_sinh' => $model->ma_hoc_sinh])->asArray()->one();

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemGiuaKi */

$this->title = 'Chỉnh sửa bảng điểm giữa kì: '.$dataHocSinh['ho_ten'];
$this->params['breadcrumbs'][] = ['label' => 'Bảng điểm rèn luyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $dataHocSinh['ho_ten'], 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bang-diem-ren-luyen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
