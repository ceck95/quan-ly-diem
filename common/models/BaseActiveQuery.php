<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/9/16
 * Time: 4:34 PM
 */

namespace common\models;


use common\core\oop\Vector;
use yii\db\ActiveQuery;

class BaseActiveQuery extends ActiveQuery
{
    private $_asVector = false;

    public function setAsVector()
    {
        $this->_asVector = true;
    }

    /**
     * @param array $rows
     * @return array | BaseModel[] | Vector
     */
    public function populate($rows)
    {
        $data = parent::populate($rows);
        if ($this->_asVector) {
            return (new Vector($data));
        }
        return $data;

    }

    /**
     * @param null $db
     * @return array | BaseModel[] | Vector
     */
    public function all($db = null)
    {
        return parent::all();
    }

}