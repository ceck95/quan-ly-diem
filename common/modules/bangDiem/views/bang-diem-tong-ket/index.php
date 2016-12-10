<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-01T22:46:43+07:00

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bangDiem\models\BangDiemTongKetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bảng điểm tổng kết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-tong-ket-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>
    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'ten_hoc_sinh',
          'ten_lop',
          'diem_trung_binh_hk1',
          'diem_trung_binh_hk2',
          'diem_trung_binh_ca_nam',
          'loai_hanh_kiem',
          'xep_loai',
        ],
    ]); ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ten_hoc_sinh:ntext',
            'ten_lop:ntext',
            'diem_trung_binh_hk1',
            'diem_trung_binh_hk2',
            'diem_trung_binh_ca_nam',
            'loai_hanh_kiem:ntext',
            'xep_loai:ntext',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
