<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T15:59:08+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-03T08:04:31+07:00

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= \common\Nexx::$app->language ?>" data-sbro-popup-lock="true" data-sbro-deals-lock="true" data-sbro-ads-lock="true">
<head>
    <meta charset="<?= \common\Nexx::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('app', 'Quản lý điểm đăng nhập') ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: #1d2024">
<?php $this->beginBody() ?>

<div id="page-wrapper" style="margin: 0 auto; max-width: 400px;">
    <?= Alert::widget() ?>
    <?= $content ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
