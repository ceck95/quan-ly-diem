<?php

/**
 * Created by thangcest2@gmail.com
 * Date 12/12/15
 * Time 3:12 PM
 */

namespace common;

use common\core\oop\ObjectScalar;
use common\core\web\FrontendApplication;
use common\core\web\BackendApplication;
use common\core\console\Application as ConsoleApp;

require(__DIR__ . '/mobile_detect.php');

class Nexx
{
    const FLUSH_CACHE = 'CLEAR_CACHE';

    public static $type = false;

    public static $isWebMobile = false;

    /**
     * @var \common\core\web\FrontendApplication | \common\core\web\BackendApplication | \common\core\console\Application | bool
     */
    public static $app = false;

    /**
     * Factory method to create Application Instance
     * @param $type
     * @param $config
     * @return \yii\base\Application
     */
    public static function createApp($type, $config)
    {
        self::$type = $type;

        if (isset($config['services'])) {
            self::initCustomServices($config['services']);
        }

        switch ($type) {
            case 'console' :
                self::$app = new ConsoleApp($config);
                break;
            case 'webBackend' :
                self::$app = new BackendApplication($config);
                break;
            case 'webFrontend' :
            default :
                self::$app = new FrontendApplication($config);
                if (mobile_device_detect(true, true, true, true, true, true, true)) {
                    self::$isWebMobile = true;
                }
                break;
        }

        if (isset($_GET[self::FLUSH_CACHE])) {
            Nexx::$app->cache->flush();
        }

        return self::$app;


    }

    /**
     * If the application need more services, use this function
     * Finally set each service to Yii DI Container
     *
     * Each service is format like:
     * [
     *  'class' => Full path to class, eg: \service\searching\Elastic.php,
     *  'isSingleton' => true|false, if true return only one singleton class in the whole project
     *  'params' => similar to other yii DI core service definition
     * ]
     *
     * Or an anonymous callable method
     *
     * @param array $services with 'components' array key
     * @return void
     */
    public static function initCustomServices($services)
    {
        foreach ($services as $key => $service) {
            if (isset($service['isSingleton']) && $service['isSingleton'] == true) {
                \Yii::$container->setSingleton($key, $service);
            } else {
                \Yii::$container->set($key, $service);
            }
        }
    }

    /**
     * @param $data
     * @param $recursive
     * @return ObjectScalar
     */
    public static function createObject($data, $recursive = false)
    {
        if (!is_object($data)) {
            return (new ObjectScalar())->setData($data, null, $recursive);
        }
        return $data;
    }


}