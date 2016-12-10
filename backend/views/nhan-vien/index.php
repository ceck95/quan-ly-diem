<?php

use yii\helpers\Html;
use common\core\web\mvc\grid\NexxGridView;
use yii\widgets\Pjax;
use \common\models\NhanVien;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NhanVienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhân viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nhan-vien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Tạo nhân viên', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= NexxGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'uid',
            'ma_nhan_vien' => [
                'attribute' => 'ma_nhan_vien',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['ma_nhan_vien', 'ma_nhan_vien'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Mã nhân viên'],
            ],
            // 'role_id',
            'ten_nhan_vien' => [
                'attribute' => 'ten_nhan_vien',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['ten_nhan_vien', 'ten_nhan_vien'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Tên nhân viên'],
            ],
            'gioi_tinh' => [
                'attribute' => 'gioi_tinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['gioi_tinh', 'gioi_tinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Giới tính'],
            ],
            'ngay_sinh' => [
                'attribute' => 'ngay_sinh',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['ngay_sinh', 'ngay_sinh'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Ngày sinh'],
            ],
            'dia_chi' => [
                'attribute' => 'dia_chi',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['dia_chi', 'dia_chi'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Địa chỉ'],
            ],
            'email' => [
                'attribute' => 'email',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['email', 'email'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Email'],
            ],
            'sdt' => [
                'attribute' => 'sdt',
                //                'width'      => '150px',
                'format' => 'raw',
                'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
                'filter' => NhanVien::findKeyValue(['sdt', 'sdt'])->toArray(),
                'filterInputOptions' => ['placeholder' => 'Số điện thoại'],
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'status' => [
                'attribute' => 'status',
                'value' => function (NhanVien $model) {
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
