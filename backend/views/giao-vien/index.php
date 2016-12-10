<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-01T22:32:08+07:00

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\models\GiaoVien;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GiaoVienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Giáo Viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giao-vien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo giáo viên', ['create'], ['class' => 'btn btn-success']) ?>
    </p
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_giao_vien' => [
                'attribute' => 'ma_giao_vien',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => GiaoVien::findKeyValue(['ma_giao_vien', 'ma_giao_vien'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã giáo viên'],
            ],
            // 'role_id',
            'ten_giao_vien' => [
                'attribute' => 'ten_giao_vien',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => GiaoVien::findKeyValue(['ten_giao_vien', 'ten_giao_vien'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Tên giáo viên'],
            ],
            'gioi_tinh' => [
                'attribute' => 'gioi_tinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => GiaoVien::findKeyValue(['gioi_tinh', 'gioi_tinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Giới tính'],
            ],
            'sdt' => [
                'attribute' => 'sdt',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => GiaoVien::findKeyValue(['sdt', 'sdt'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Số điện thoại'],
            ],
            'ma_lop_giang_day' => [
                'attribute' => 'ma_lop_giang_day',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'value' => function (\common\models\GiaoVien $model) {
                    $textFirst = str_replace('{', '', $model->ma_lop_giang_day);

                    return str_replace('}', '', $textFirst);
                },
                'filter' => GiaoVien::findKeyValue(['ma_lop_giang_day', 'ma_lop_giang_day'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã lớp giảng dạy'],
            ],
            'ma_mon_giang_day' => [
                'attribute' => 'ma_mon_giang_day',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'value' => function (\common\models\GiaoVien $model) {
                    $textFirst = str_replace('{', '', $model->ma_mon_giang_day);

                    return str_replace('}', '', $textFirst);
                },
                'filter' => GiaoVien::findKeyValue(['ma_mon_giang_day', 'ma_mon_giang_day'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã môn giảng dạy'],
            ],
            'ma_lop_chu_nhiem' => [
                'attribute' => 'ma_lop_chu_nhiem',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => GiaoVien::findKeyValue(['ma_lop_chu_nhiem', 'ma_lop_chu_nhiem'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã lớp chủ nhiệm'],
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'status' => [
                'attribute' => 'status',
                'value' => function (GiaoVien $model) {
                    return \common\utilities\Common::getStrStatus($model->status);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', \common\utilities\Common::getStatusArr(), [
                    'class' => 'form-control',
                    'prompt' => 'All',
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
