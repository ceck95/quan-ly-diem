<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/15/16
 * Time: 1:35 PM
 */

namespace common\observers\customer;

use backend\business\BusinessCustomer;
use backend\business\BusinessDriver;
use common\core\observer\ObserverInterface;
use common\core\oop\ObjectScalar;
use common\modules\file\business\BusinessFile;
use common\modules\file\FileInfoObject;
use common\Nexx;
use common\utilities\Dir;

class CustomerResizeImageObserver extends ObjectScalar implements ObserverInterface
{
    /**
     * @var FileInfoObject
     */
    public $imageFileObject;
    
    public $oldFileUrl;
    
    /**
     * @param BusinessDriver $publisher
     * @return string
     */
    public function update($publisher)
    {
        BusinessFile::getInstance()->removeHardDiskStorage(BusinessCustomer::FILE_PATH_CUSTOMER_AVATAR_384x384, $this->oldFileUrl);
        
        $thumbPath = \Yii::getAlias('@backend/web/uploads') . BusinessCustomer::FILE_PATH_CUSTOMER_AVATAR_384x384;
        Dir::mkdirs($thumbPath);

        $imageMagickPath = isset(Nexx::$app->params['image_magic']) ? Nexx::$app->params['image_magic'] : '/opt/ImageMagick/bin/convert';
        $cmd  = $imageMagickPath ." " . $this->imageFileObject->getPath() . " -resize " . "384x384" . "^ -gravity center " . $thumbPath . $this->imageFileObject->getName();
        $ret = shell_exec($cmd);
        return $ret;

    }

}