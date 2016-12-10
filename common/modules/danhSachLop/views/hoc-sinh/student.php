<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T11:52:13+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T12:09:33+07:00

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\danhSachLop\models\HocSinhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Học sinh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoc-sinh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo học sinh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_hoc_sinh',
            'ho_ten',
            'gioi_tinh',
            'ngay_sinh:ntext',
            // 'ton_giao:ntext',
            'dia_chi',
            'ma_phu_huynh',
            //sdt,
            'ma_lop',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
