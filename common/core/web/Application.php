<?php

/**
 * Created by thangcest2@gmail.com
 * Date 12/12/15
 * Time 3:22 PM
 */

namespace common\core\web;

/**
 * @property \common\core\web\http\Request $request
 *
 * Class Application
 * @package common\core\web
 */
class Application extends \yii\web\Application
{
//    public $language = 'vi-VN';

    public function __construct($config)
    {
        parent::__construct($config);

    }

}