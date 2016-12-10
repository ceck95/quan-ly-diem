<?php

require __DIR__.'/../../common/config/functions.php';
define('APPROOT', dirname(dirname(__DIR__)));
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', APPROOT.'/frontend');
Yii::setAlias('backend', APPROOT.'/backend');
Yii::setAlias('console', APPROOT.'/console');

define('STATUS_DELETED', 2);
define('STATUS_HIDE', 0);
define('STATUS_ACTIVE', 1);
define('ITEM_PER_PAGE', 10);
define('ITEM_PER_PAGE_20', 20);
define('PASSWORD_DEFAULT', '12345');
