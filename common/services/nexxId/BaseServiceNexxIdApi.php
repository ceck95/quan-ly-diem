<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/14/16
 * Time: 2:17 PM
 */

namespace common\services\nexxId;


use common\core\httpApi\ServiceHttpApiAbstract;
use common\core\httpApi\ServiceHttpApiInterface;
use common\modules\systemSetting\business\BusinessSystemSetting;

class BaseServiceNexxIdApi extends ServiceHttpApiAbstract
{
    public function __construct($uri, $method = ServiceHttpApiInterface::METHOD_POST)
    {
        parent::__construct($uri, $method);
        $authParams = BusinessSystemSetting::getInstance()->getMultipleConfig([
                'service_api_nexxid_client_id',
                'service_api_nexxid_client_secret',
            ]);
        $auth       = base64_encode($authParams['service_api_nexxid_client_id'] . ':' . $authParams['service_api_nexxid_client_secret']);
        $this->addHeader('Authorization', "Basic " . $auth);
    }

    public function getHost()
    {
        return BusinessSystemSetting::getInstance()->getConfig('service_api_nexxid_host');
    }


}