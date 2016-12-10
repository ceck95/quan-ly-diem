<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\danhSachLop\models\HocSinh */

$this->title = 'Tạo học sinh';
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoc-sinh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
