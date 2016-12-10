<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T15:59:08+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T16:25:09+07:00

namespace common\modules\adminUser\models;

/**
 * This is the model class for table "adminuser.role_right".
 *
 * @property int $id
 * @property int $role_id
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property int $is_owner
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class RoleRight extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adminuser.role_right';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module', 'controller', 'action'], 'string'],
            [['role_id', 'is_owner', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'UID',
            'role_id' => 'Role ID',
            'controller' => 'Controller',
            'action' => 'Action',
            'is_owner' => 'Is Owner',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getPermission($roleId, $module, $controller, $action)
    {
        $conditions = ['role_id' => $roleId, 'controller' => $controller, 'action' => $action];
        if ($module) {
            $conditions['module'] = $module;
        }
        $rightDb = $this->find()
            ->andWhere($conditions)
            ->one();

        return $rightDb;
    }
}
