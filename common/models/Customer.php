<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dtaxi.customer".
 *
 * @property integer $uid
 * @property string $email
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $display_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $avatar
 * @property string $activity
 * @property string $metadata
 * @property string $settings
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 */
class Customer extends \common\models\BaseModel
{
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hc.customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_number'], 'required'],
            [['uid', 'created_by', 'updated_by', 'status'], 'integer'],
            [
                [
                    'email',
                    'phone_number',
                    'first_name',
                    'last_name',
                    'display_name',
                    'gender',
                    'avatar',
                    'activity',
                    'metadata',
                    'settings',
                    'tsv'
                ],
                'string'
            ],
            [['date_of_birth', 'created_at', 'updated_at', 'password'], 'safe'],
            [['phone_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid'           => Yii::t('app', 'Uid'),
            'email'         => Yii::t('app', 'Email'),
            'phone_number'  => Yii::t('app', 'Phone Number'),
            'first_name'    => Yii::t('app', 'First Name'),
            'last_name'     => Yii::t('app', 'Last Name'),
            'display_name'  => Yii::t('app', 'Display Name'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'gender'        => Yii::t('app', 'Gender'),
            'avatar'        => Yii::t('app', 'Avatar'),
            'activity'      => Yii::t('app', 'Activity'),
            'metadata'      => Yii::t('app', 'Metadata'),
            'settings'      => Yii::t('app', 'Settings'),
            'created_at'    => Yii::t('app', 'Created At'),
            'updated_at'    => Yii::t('app', 'Updated At'),
            'created_by'    => Yii::t('app', 'Created By'),
            'updated_by'    => Yii::t('app', 'Updated By'),
            'status'        => Yii::t('app', 'Status'),
        ];
    }
}
