<?php

/**
 * Created by thangcest2@gmail.com
 * Date 12/17/15
 * Time 2:59 AM.
 */

namespace common\utilities;

use common\core\oop\ObjectScalar;
use common\Nexx;

class ArraySimple
{
    /**
     * Input Sample
     * array
     * 0 =>
     * [
     * 'key' => 123
     * 'value' => abc
     * ].
     *
     * 1 =>
     * [
     * 'key' => 456
     * 'value' => def
     * ]
     * Out Sample
     * [123 => abc, 456 => def]
     *
     *
     * @param $rows array of object which implemented \ArrayAccess or array, and have valid key
     * @param $fields array of key => value without duplicating $key
     * @param $asObject bool
     *
     * @return array
     */
    public static function keyValue($rows, $fields, $asObject = true)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[$row[$fields[0]]] = $row[$fields[1]];
        }

        if ($asObject) {
            return (new ObjectScalar())->setData($data);
        }

        return $data;
    }

    /**
     * Input Sample.
     [
     0 => [
     'id' => 2,
     'name' => 'abc',
     ],
     1 => [
     'id' => 3,
     'name' => 'def',
     ]
     ]

     * Output Sample
     [
     2 => [
     'id' => 2,
     'name' => 'abc',
     ],
     3 => [
     'id' => 3,
     'name' => 'def',
     ]
     ]

     * Normally extract array list of Model data such as UserNotification[], or a hasmany call
     * Replace key of values in $data by value of each element at the $fieldToBeKey
     *
     * @param $data array | array object, object must be instance of \ArrayAccess
     * @param $fieldToBeKey string :eg
     * @param $group string :eg
     *
     * @return array
     */
    public static function makeKeyPath($data, $fieldToBeKey, $group = null)
    {
        if (!empty($group)) {
            $r = [];
            foreach ($data as $d) {
                if ($fieldToBeKey == null) {
                    $r[$d[$group]][] = $d;
                } else {
                    $r[$d[$group]][$d[$fieldToBeKey]] = $d;
                }
            }
        } else {
            $r = [];
            foreach ($data as $d) {
                $r[$d[$fieldToBeKey]] = $d;
            }
        }

        return $r;
    }

    /**
     * Input Sample.
     [
     0 => [
     'id' => 2,
     ],
     1 => [
     'id' => 3,
     ]
     ]

     * Output Sample [2,3]
     *
     * @param $data
     * @param $field
     *
     * @return array
     */
    public static function extractByField($data, $field)
    {
        $in = [];
        foreach ($data as $d) {
            $in[] = $d[$field];
        }

        return $in;
    }

    public static function random($arr)
    {
        return $arr[array_rand($arr)];
    }

    public static function getLike($arr, $likeString = '')
    {
        $d = [];
        foreach ($arr as $k => $v) {
            if (strpos($k, $likeString) !== false) {
                $d[$k] = $v;
            }
        }

        return Nexx::createObject($d);
    }

    public static function getSubArrayByKeys($arr, $keys)
    {
        $d = [];
        foreach ($arr as $k => $v) {
            if (in_array($k, $keys)) {
                $d[$k] = $v;
            }
        }

        return Nexx::createObject($d);
    }

    public static function makeKeyPathRecursive($data, $fieldToBeKeys = [], $emptyValue = 'no_value')
    {
        $rd = [];
        $firstKey = array_shift($fieldToBeKeys);
        if (count($fieldToBeKeys) == 0) {
            foreach ($data as $d) {
                $valueOfFirstKey = $d[$firstKey] ?: $emptyValue;
                $rd[$valueOfFirstKey][] = $d;
            }
        } else {
            $valueOfCurrentKeys = [];
            foreach ($data as $d) {
                $valueOfFirstKey = $d[$firstKey] ?: $emptyValue;
                $rd[$valueOfFirstKey][] = $d;
                if (!in_array($valueOfFirstKey, $valueOfCurrentKeys)) {
                    $valueOfCurrentKeys[] = $valueOfFirstKey;
                }
            }
            foreach ($valueOfCurrentKeys as $valueOfCurrentKey) {
                $rd[$valueOfCurrentKey] = self::makeKeyPathRecursive($rd[$valueOfCurrentKey], $fieldToBeKeys);
            }
        }

        return $rd;
    }
}
