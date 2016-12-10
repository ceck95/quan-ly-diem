<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\bangDiem\models\BangDiemTongKet */

$this->title = 'Update Bang Diem Tong Ket: ' . $model->uid;
$this->params['breadcrumbs'][] = ['label' => 'Bang Diem Tong Kets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bang-diem-tong-ket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
