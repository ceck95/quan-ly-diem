<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/3/16
 * Time: 3:28 PM
 */
namespace common\helpers;


use common\core\web\mvc\form\NexxActiveForm;
use common\models\BaseModel;

class Html
{
    public static function activeText($stdVal = '', $cmpVal = '', $text = 'active')
    {
        if (strpos($stdVal, $cmpVal) !== false) {
            return " $text";
        }
        return null;
    }

    public static function moneyToDouble($money)
    {
        $money = str_replace(',', '', $money);
        return doubleval($money);
    }

    public static function yesOrNo($v)
    {
        return $v ? 'Có' : 'Không';
    }

    public static function image($link)
    {
        if (empty($link)) {
            return '<a href="/imgs/nothing-to-display.png" target="_blank"><img style=\'max-width: 100px;\' src="/imgs/nothing-to-display.png" /></a>';
        }
        return "<a href='/uploads/$link' target='_blank'><img style='max-width: 100px;' src='/uploads/$link'/></a>";
    }

}
