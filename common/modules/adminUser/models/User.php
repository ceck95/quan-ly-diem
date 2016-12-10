<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T15:59:08+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-12-03T08:06:46+07:00

namespace common\modules\adminUser\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "adminuser.user".
 *
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property string $username
 * @property string $avatar
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string $position
 * @property string $dob
 * @property string $desc
 * @property string $fullname
 * @property Role $role
 */
class User extends \common\models\BaseModel implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adminuser.user';
    }

    /**
     * {@inheritdoc}
     */
    public $password_hash_repeat;
    public function rules()
    {
        return [
            [['email', 'username', 'avatar', 'auth_key', 'password_hash', 'password_reset_token', 'position', 'dob', 'desc', 'fullname'], 'string'],
            [['status', 'created_by', 'updated_by', 'role_id'], 'integer'],
            [['username', 'email'], 'unique'],
            [['created_at', 'updated_at'], 'safe'],
            [['password_hash_repeat'], 'compare', 'compareAttribute' => 'password_hash'],
            [['status', 'role_id', 'email', 'username'], 'required'],
            [['password_hash', 'password_hash_repeat'], 'required', 'on' => 'create'],
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
            'email' => 'Email',
            'username' => 'Username',
            'avatar' => 'Avatar',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'position' => 'Position',
            'dob' => 'DateOfBirth',
            'desc' => 'Description',
            'fullname' => 'Fullname',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['uid' => $id, 'status' => self::STATUS_ACTIVE]);
        // return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username.
     *
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token.
     *
     * @param string $token password reset token
     *
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid.
     *
     * @param string $token password reset token
     *
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];

        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password.
     *
     * @param string $password password to validate
     *
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model.
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key.
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token.
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString().'_'.time();
    }

    /**
     * Removes password reset token.
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                return true;
            } else {
                if (!$this->password_hash) {
                    $this->password_hash = $this->oldAttributes['password_hash'];
                }

                return true;
            }

            return true;
        } else {
            return false;
        }
    }
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['uid' => 'role_id']);
    }
}
