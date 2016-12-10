<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T11:06:50+07:00

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/9/16
 * Time: 4:08 PM.
 */

namespace common\models;

use common\core\oop\ObjectScalar;
use common\Nexx;
use common\utilities\ArraySimple;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

class BaseModel extends ActiveRecord
{
    public $emptyField;

    const STATUS_DELETED = STATUS_DELETED;
    const STATUS_ACTIVE = STATUS_ACTIVE;
    const STATUS_HIDE = STATUS_HIDE;

    public function writeData($data)
    {
        if (is_array($data)) {
            $data = (new ObjectScalar())->setData($data);
        }
        foreach ($data->getAttrs() as $attr) {
            if ($this->hasAttribute($attr)) {
                $this->setAttribute($attr, $data->getData($attr));
            }
        }
    }

    /**
     * override insert & update method (add created_by, created_at, updated_by, updated_at attributes value).
     *
     * @param bool|true $runValidation
     * @param null      $attributeNames
     *
     * @return bool
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->getIsNewRecord()) {
            $this->_setCreatedAt();
        } else {
            $this->_setUpdatedAt();
        }

        return parent::save($runValidation, $attributeNames);
    }
    public function uploadfile($imageFile, $bonusName = null)
    {
        $getImageFile = $imageFile[0];
        if ($getImageFile) {
            if ($bonusName) {
                $nameFile = 'uploads/'.$bonusName.$getImageFile->baseName.'.'.$getImageFile->extension;
                $getImageFile->saveAs($nameFile);

                return '/'.$nameFile;
            } else {
                $nameFile = 'uploads/'.$getImageFile->baseName.'.'.$getImageFile->extension;
                $getImageFile->saveAs($nameFile);

                return '/'.$nameFile;
            }
        }
    }
    /**
     * override insert mothod, add created_by and created_at attributes value.
     *
     * @param bool|true $runValidation
     * @param null      $attributes
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function insert($runValidation = true, $attributes = null)
    {
        $this->_setCreatedAt();

        return parent::insert($runValidation, $attributes);
    }

    /**
     * override update method, add updated_by and updated_at attributes value.
     *
     * @param bool|true $runValidation
     * @param null      $attributes
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function update($runValidation = true, $attributes = null)
    {
        $this->_setUpdatedAt();

        return parent::update($runValidation, $attributes);
    }

    /**
     * override delete mothod, don't delete, only set status to deleted.
     *
     * @param bool|true $runValidation
     * @param null      $attributeNames
     *
     * @return bool
     */
    public function delete($runValidation = false, $attributeNames = null)
    {
        if ($this->hasAttribute('status') && $this->hasAttribute('updated_at')) {
            $this->_setUpdatedAt();
            $this->_setDeletedStatus();

            return parent::save($runValidation, $attributeNames);
        }

        return $this->delete();
    }

    /**
     * override deleteAll method, only update deleted_at.
     *
     * @param string|array $condition
     * @param bool         $isForce
     * @param array        $params
     *
     * @return int
     */
    public static function deleteAll($condition = '', $params = [], $isForce = false)
    {
        if ($isForce) {
            return parent::deleteAll($condition, $params);
        } else {
            return parent::updateAll([
                'status' => self::STATUS_DELETED,
                'updated_at' => date('Y-m-d H:i:s', time()),
            ], $condition, $params);
        }
    }

    /**
     * Hook into every kind of find method which is use by ActiveRecord, that's only find the not yet deleted records.
     *
     * @return BaseActiveQuery
     */
    public static function find()
    {
        /*
         * @var BaseActiveQuery
         */
        $query = \Yii::createObject(BaseActiveQuery::className(), [get_called_class()]);
        $tableName = static::tableName();
        if (!in_array(Nexx::$app->id, ['backend'])) {
            $query->andWhere($tableName.'.status = '.self::STATUS_ACTIVE);
            $query->orWhere($tableName.'.status = '.self::STATUS_HIDE);
        } else {
            $query->andWhere($tableName.'.status <> '.self::STATUS_DELETED);
        }
        $query->orWhere($tableName.'.status IS NULL ');

        return $query;
    }

    /**
     * @param array $conditions
     *
     * @return static
     */
    public static function findOneOrNew($conditions = [])
    {
        $d = static::findOne($conditions);
        if (empty($d)) {
            return new static();
        }

        return $d;
    }

    /**
     * @param array $conditions
     *
     * @return static
     *
     * @throws NotFoundHttpException
     */
    public static function findOneOrFail($conditions = [])
    {
        $d = static::findOne($conditions);
        if (empty($d)) {
            throw new NotFoundHttpException();
        }

        return $d;
    }

    /**
     * @return BaseActiveQuery
     *
     * @throws \yii\base\InvalidConfigException
     */
    public static function findAsVector()
    {
        /**
         * @var BaseActiveQuery
         */
        $query = \Yii::createObject(BaseActiveQuery::className(), [get_called_class()]);
        $query->setAsVector();
        $query->andWhere(static::tableName().'.status <> '.self::STATUS_DELETED);
        $query->orWhere(static::tableName().'.status IS NULL ');

        return $query;
    }

    /**
     * Extract 2 fields in query to key value pair array.
     *
     * @param $fields
     * @param int   $limit
     * @param mixed $condition
     *
     * @return ObjectScalar
     */
    public static function findKeyValue($fields, $condition = '', $limit = -1)
    {
        $query = static::find()
            ->select($fields)
            ->andWhere($condition)
            ->from(static::tableName())
            ->limit($limit);
        $rows = $query->createCommand()
            ->queryAll();

        return ArraySimple::keyValue($rows, $fields);
    }

    /**
     * get max value of field.
     *
     * @param $field
     *
     * @return mixed
     */
    public static function getMax($field)
    {
        return self::find()
            ->max($field);
    }

    /**
     * get min value of field.
     *
     * @param $field
     *
     * @return mixed
     */
    public static function getMin($field)
    {
        return self::find()
            ->min($field);
    }

    /**
     * In case of system auto update, some field such as update_by should be disabled.
     *
     * @param $field string a field in table schema
     *
     * @return $this
     */
    public function unsetField($field)
    {
        $this->{$field} = null;

        return $this;
    }

    /**
     * get current user id.
     *
     * @return int $userId
     */
    private function _getCurrentUserId()
    {
        $user = adminuser();

        return $user ? $user->getId() : 0;
    }

    protected function _setCreatedAt()
    {
        if ($this->hasAttribute('created_by')) {
            $this->setAttribute('created_by', self::_getCurrentUserId());
        }

        if ($this->hasAttribute('created_at')) {
            $this->setAttribute('created_at', date('Y-m-d H:i:s', time()));
        }

        if ($this->hasAttribute('updated_at')) {
            $this->setAttribute('updated_at', date('Y-m-d H:i:s', time()));
        }

        return $this;
    }

    protected function _setUpdatedAt()
    {
        if ($this->hasAttribute('updated_by')) {
            $this->setAttribute('updated_by', self::_getCurrentUserId());
        }
        if ($this->hasAttribute('updated_at')) {
            $this->setAttribute('updated_at', date('Y-m-d H:i:s', time()));
        }

        return $this;
    }

    protected function _setDeletedStatus()
    {
        $this->setAttribute('status', self::STATUS_DELETED);

        return $this;
    }

    /**
     * return a copy of called Model.
     *
     * @return self|static
     */
    public function copy()
    {
        $data = $this->toArray();
        if (isset($data['id'])) {
            unset($data['id']);
        }

        $o = new static();
        $o->setAttributes($data);

        return $o;
    }
}
