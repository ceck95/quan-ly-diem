<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/15/16
 * Time: 3:02 PM
 */

namespace common\modules\file;


use common\core\oop\ObjectScalar;

/**
 * Class FileInfoObject
 * @package common\modules\file
 */
class FileInfoObject extends ObjectScalar
{
    public function getUrl()
    {
        return $this->_data['url'];
    }
    
    public function getPath()
    {
        return $this->_data['path'];
    }

    public function getName()
    {
        return $this->_data['name'];
    }

    public function getExt()
    {
        return $this->_data['ext'];
    }

}