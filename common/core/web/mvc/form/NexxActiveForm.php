<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/14/16
 * Time: 3:34 PM
 */

namespace common\core\web\mvc\form;
use kartik\form\ActiveForm;

/**
 * Class NexxActiveForm
 * @package common\core\web\mvc\form
 * 
 * @method NexxActiveField field($model, $attribute, $options = [])
 */

class NexxActiveForm extends ActiveForm 
{
    public $fieldConfig = [
        'class' => NexxActiveField::class,
    ];

    public static function beginMultipart($configs = [])
    {
        if (!isset($configs['options'])) {
            $configs['options'] = [
                'enctype'        => 'multipart/form-data',
            ];
        } else {
            $configs['options']['enctype'] = 'multipart/form-data';
        }
        return static::begin($configs);

    }
    
}