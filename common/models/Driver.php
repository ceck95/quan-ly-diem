<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dtaxi.driver".
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
 * @property string $driver_license_image_front
 * @property string $driver_license_image_back
 * @property string $driver_license_number
 * @property string $driver_license_type
 * @property string $driver_license_issue
 * @property string $driver_license_expiry
 * @property string $identity_number_image_front
 * @property string $identity_number_image_back
 * @property string $identity_number
 * @property string $identity_number_issue
 * @property integer $experience_years
 * @property string $rating
 * @property boolean $is_verified
 * @property string $balance
 * @property string $bank_code
 * @property string $bank_account_number
 * @property string $bank_account_name
 * @property string $metadata
 * @property string $settings
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 * @property string $tsv
 */
class Driver extends \common\models\BaseModel
{
    public $password;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dtaxi.driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //, 'metadata', 'settings' json
        //'avatar', 'driver_license_image_front', 'driver_license_image_back', 'identity_number_image_front', 'identity_number_image_back',  image
        return [
            [['phone_number'], 'required'],
            [['uid', 'experience_years', 'created_by', 'updated_by', 'status'], 'integer'],
            [
                [
                    'email',
                    'phone_number',
                    'first_name',
                    'last_name',
                    'display_name',
                    'gender',
                    'driver_license_number',
                    'driver_license_type',
                    'identity_number',
                    'bank_code',
                    'bank_account_number',
                    'bank_account_name',
                    'tsv'
                ],
                'string'
            ],
            [
                [
                    'date_of_birth',
                    'driver_license_issue',
                    'driver_license_expiry',
                    'identity_number_issue',
                    'created_at',
                    'updated_at',
                    'password',
                ],
                'safe'
            ],
            [['rating', 'balance'], 'number'],
            [['is_verified'], 'boolean'],
            [['phone_number'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid'                         => Yii::t('app', 'Uid'),
            'email'                       => Yii::t('app', 'Email'),
            'phone_number'                => Yii::t('app', 'Phone Number'),
            'first_name'                  => Yii::t('app', 'First Name'),
            'last_name'                   => Yii::t('app', 'Last Name'),
            'display_name'                => Yii::t('app', 'Display Name'),
            'date_of_birth'               => Yii::t('app', 'Date Of Birth (Y-m-d)'),
            'gender'                      => Yii::t('app', 'Gender'),
            'avatar'                      => Yii::t('app', 'Avatar'),
            'driver_license_image_front'  => Yii::t('app', 'Driver License Image Front'),
            'driver_license_image_back'   => Yii::t('app', 'Driver License Image Back'),
            'driver_license_number'       => Yii::t('app', 'Driver License Number'),
            'driver_license_type'         => Yii::t('app', 'Driver License Type'),
            'driver_license_issue'        => Yii::t('app', 'Driver License Issue'),
            'driver_license_expiry'       => Yii::t('app', 'Driver License Expiry'),
            'identity_number_image_front' => Yii::t('app', 'Identity Number Image Front'),
            'identity_number_image_back'  => Yii::t('app', 'Identity Number Image Back'),
            'identity_number'             => Yii::t('app', 'Identity Number'),
            'identity_number_issue'       => Yii::t('app', 'Identity Number Issue'),
            'experience_years'            => Yii::t('app', 'Experience Years'),
            'rating'                      => Yii::t('app', 'Rating'),
            'is_verified'                 => Yii::t('app', 'Is Verified'),
            'balance'                     => Yii::t('app', 'Balance'),
            'bank_code'                   => Yii::t('app', 'Bank Code'),
            'bank_account_number'         => Yii::t('app', 'Bank Account Number'),
            'bank_account_name'           => Yii::t('app', 'Bank Account Name'),
            'metadata'                    => Yii::t('app', 'Metadata'),
            'settings'                    => Yii::t('app', 'Settings'),
            'created_at'                  => Yii::t('app', 'Created At'),
            'updated_at'                  => Yii::t('app', 'Updated At'),
            'created_by'                  => Yii::t('app', 'Created By'),
            'updated_by'                  => Yii::t('app', 'Updated By'),
            'status'                      => Yii::t('app', 'Status'),
            'tsv'                         => Yii::t('app', 'Tsv'),
        ];
    }
}
