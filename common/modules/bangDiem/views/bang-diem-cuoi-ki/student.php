<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-01T22:48:06+07:00

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\bangDiem\models\BangDiemCuoiKiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bảng điểm cuối kì';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-cuoi-ki-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo bảng điểm cuối kì', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
          ['class' => 'yii\grid\SerialColumn'],
          'ten_hoc_sinh',
          'ten_lop',
          'ten_mon',
          'kiem_tra_mieng',
          'kiem_tra_15_phut',
          'kiem_tra_1_tiet',
          'thi',
          'diem_trung_binh',
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
            'ten_mon',
            'kiem_tra_mieng',
            'kiem_tra_15_phut',
            'kiem_tra_1_tiet',
            'thi',
            'diem_trung_binh',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
