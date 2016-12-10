<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/16/16
 * Time: 12:36 PM
 */

namespace common\services;

class NexxSystemHelper
{
    public static function getFirstErrorMessage($errors)
    {
        return $errors[0]['uiMessage'];
    }

}