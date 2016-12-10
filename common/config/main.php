<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-26T14:55:05+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T16:15:20+07:00

return [
    'vendorPath' => dirname(dirname(__DIR__)).'/vendor',
    'components' => [

        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'modules' => [
        'adminUser' => [
            'class' => common\modules\adminUser\Module::class,
        ],
       'danhSachLop' => [
            'class' => common\modules\danhSachLop\Module::class,
        ],
        'bangDiem' => [
              'class' => 'common\modules\bangDiem\Module',
        ],
    ],

];
