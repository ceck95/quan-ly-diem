<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GiaoVien */

$this->title = 'Tạo giáo viên';
$this->params['breadcrumbs'][] = ['label' => 'Giáo viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giao-vien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
