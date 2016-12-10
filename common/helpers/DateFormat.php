<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 12/21/15
 * Time: 5:32 PM
 */

namespace common\helpers;


class DateFormat
{
    public static function dates($firstWord = false)
    {
        $t = [];
        if ($firstWord) {
            $t[''] = $firstWord;
        }
        for ($i = 1; $i<=31; $i++) {
            $t[$i] = $i;
        }

        return $t;
    }

    public static function months($firstWord = false)
    {
        $t = [];
        if ($firstWord) {
            $t[''] = $firstWord;
        }
        for ($i = 1; $i<=12; $i++) {
            $t[$i] = $i;
        }

        return $t;
    }

    public static function years($firstWord = false, $maxY)
    {
        $currentYear = (int)date('Y');
        $t = [];
        if ($firstWord) {
            $t[''] = $firstWord;
        }

        for ($i = $maxY; $i >= $currentYear - 88 ; $i--) {
            $t[$i] = $i;
        }

        return $t;
    }

    /**
     * Date of birth to timestamp
     *
     * @param $y
     * @param $m
     * @param $d
     * @return int
     */
    public static function dateToTimestamp($y, $m, $d)
    {
        if (empty($y) || empty($m) || empty($d)) {
            return null;
        }
        $date = \DateTime::createFromFormat("Y m d", "$y $m $d");
        return $date->getTimestamp();

    }
    
}