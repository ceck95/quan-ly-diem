<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/14/16
 * Time: 2:14 PM
 */

namespace common\services\driverApi;


use common\core\httpApi\ServiceHttpApiAbstract;
use common\core\oop\ObjectScalar;
use common\modules\systemSetting\BusinessSystemSetting;

class BaseServiceDriverApi extends ServiceHttpApiAbstract
{
    public function getHost()
    {
        return BusinessSystemSetting::getInstance()->getConfig('service_api_driver_host');
    }

}