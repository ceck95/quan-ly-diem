<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-28T00:02:18+07:00

use yii\helpers\Html;
use common\modules\danhSachLop\models\HocSinh;

$dataHocSinh = HocSinh::find()->andWhere(['ma_hoc_sinh' => $model->ma_hoc_sinh])->asArray()->one();

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemCuoiKi */

$this->title = 'Update Bang Diem Cuoi Ki: '.$dataHocSinh['ho_ten'];
$this->params['breadcrumbs'][] = ['label' => 'Bang Diem Cuoi Kis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $dataHocSinh['ho_ten'], 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bang-diem-cuoi-ki-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
