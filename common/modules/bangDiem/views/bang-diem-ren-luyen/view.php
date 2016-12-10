<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-28T15:49:41+07:00

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\modules\danhSachLop\models\HocSinh;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemGiuaKi */
$dataHocSinh = HocSinh::find()->andWhere(['ma_hoc_sinh' => $model->ma_hoc_sinh])->asArray()->one();
$this->title = $dataHocSinh['ho_ten'];
$this->params['breadcrumbs'][] = ['label' => 'Bảng điểm rèn luyện', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-ren-luyen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'uid',
            'ma_hoc_sinh:ntext',
            'diem_ren_luyen',
            'loai_hanh_kiem:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'status',
        ],
    ]) ?>

</div>
