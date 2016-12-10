<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/14/16
 * Time: 3:39 PM
 */

namespace common\core\web\mvc\form;


use kartik\widgets\ActiveField;

class NexxActiveField extends ActiveField
{
    public function fileInputWithPreview($options = [])
    {
        return $this->fileInput($options);
    }

}