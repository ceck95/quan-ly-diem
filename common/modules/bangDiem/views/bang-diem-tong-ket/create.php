<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemTongKet */

$this->title = 'Create Bang Diem Tong Ket';
$this->params['breadcrumbs'][] = ['label' => 'Bang Diem Tong Kets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bang-diem-tong-ket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
