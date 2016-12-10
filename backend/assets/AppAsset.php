<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sb-admin-theme/css/bootstrap.css',
        'sb-admin-theme/css/sb-admin.css',
        'sb-admin-theme/css/plugins/morris.css',
        'sb-admin-theme/font-awesome/css/font-awesome.min.css',
        'libs/datetimebootstrap/css/bootstrap-datetimepicker.min.css',
    ];
    public $js = [
        // 'sb-admin-theme/js/jquery.js',
        'libs/datetimebootstrap/js/moment.min.js',
        'sb-admin-theme/js/bootstrap.min.js',
//        'sb-admin-theme/js/plugins/morris/raphael.min.js',
//        'sb-admin-theme/js/plugins/morris/morris.min.js',
//        'sb-admin-theme/js/plugins/morris/morris-data.js',
        '//cdn.ckeditor.com/4.5.9/full/ckeditor.js',
        'libs/datetimebootstrap/js/bootstrap-datetimepicker.min.js',
        'js/admin.js',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD,
    );

    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
