<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\Lop */

$this->title = 'Tạo lớp';
$this->params['breadcrumbs'][] = ['label' => 'Lớp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
