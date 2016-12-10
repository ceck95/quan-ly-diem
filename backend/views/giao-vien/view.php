<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-26T12:24:51+07:00

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GiaoVien */

$this->title = $model->ten_giao_vien;
$this->params['breadcrumbs'][] = ['label' => 'Giáo viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giao-vien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->uid], [
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
            'ma_giao_vien:ntext',
            'role_id',
            'ten_giao_vien:ntext',
            'gioi_tinh:ntext',
            'sdt:ntext',
            'ma_lop_giang_day:ntext',
            'ma_lop_chu_nhiem:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'status',
        ],
    ]) ?>

</div>
