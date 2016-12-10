<?php

namespace common\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "hc.cleaner".
 *
 * @property integer $uid
 * @property string $level_id
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $display_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $avatar
 * @property string $identity_number_image_front
 * @property string $identity_number_image_back
 * @property string $identity_number
 * @property string $identity_number_issue
 * @property string $rating
 * @property string $is_verified
 * @property string $bank_code
 * @property string $bank_account_number
 * @property string $bank_account_name
 * @property string $activity
 * @property string $metadata
 * @property string $settings
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $email
 * @property integer $tsv
 */
class Cleaner extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hc.cleaner';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_number','level_id','date_of_birth','identity_number_issue','status'], 'required'],
            [['created_by', 'updated_by', 'status','level_id','activity','balance','rating'], 'integer'],
            [
                [
                    'phone_number',
                    'first_name',
                    'last_name',
                    'display_name',
                    'gender',
                    'avatar',
                    'activity',
                    'metadata',
                    'settings',
                    'tsv',
                    'identity_number',
                    'bank_code',
                    'bank_account_number',
                    'bank_account_name',
                    'identity_number_image_front',
                    'identity_number_image_back'
                ],
                'string'
            ],
            [['date_of_birth', 'created_at', 'updated_at','identity_number_issue'], 'safe'],
            [['is_verified'], 'boolean'],
            [['phone_number'], 'unique'],
            [['email'],'email'],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions'=>['png', 'jpg'], 'checkExtensionByMimeType'=>false, 'maxSize'=>1024 * 1024 * 2]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid'           => Yii::t('app', 'Uid'),
            'level_id'      => Yii::t('app', 'Level Id'),
            'email'         => Yii::t('app', 'Email'),
            'phone_number'  => Yii::t('app', 'Phone Number'),
            'first_name'    => Yii::t('app', 'First Name'),
            'last_name'     => Yii::t('app', 'Last Name'),
            'display_name'  => Yii::t('app', 'Display Name'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'gender'        => Yii::t('app', 'Gender'),
            'avatar'        => Yii::t('app', 'Avatar'),
            'identity_number_image_front'        => Yii::t('app', 'Identify Number Image Front'),
            'identity_number_image_back'        => Yii::t('app', 'Identify Number Image Back'),
            'identity_number'        => Yii::t('app', 'Identify Number'),
            'identity_number_issue'        => Yii::t('app', 'Identify Number Issue'),
            'rating'        => Yii::t('app', 'Rating'),
            'activity'      => Yii::t('app', 'Activity'),
            'is_verified'      => Yii::t('app', 'Is Verified'),
            'balance'      => Yii::t('app', 'Balance'),
            'bank_code'      => Yii::t('app', 'Bank Code'),
            'bank_account_number'      => Yii::t('app', 'Bank Account Number'),
            'bank_account_name'      => Yii::t('app', 'Bank Account Name'),
            'metadata'      => Yii::t('app', 'Metadata'),
            'settings'      => Yii::t('app', 'Settings'),
            'created_at'    => Yii::t('app', 'Created At'),
            'updated_at'    => Yii::t('app', 'Updated At'),
            'created_by'    => Yii::t('app', 'Created By'),
            'updated_by'    => Yii::t('app', 'Updated By'),
            'status'        => Yii::t('app', 'Status'),
        ];
    }
    //Extends \yii\db\ActiveRecord
    // public function autoInCreament(){
    //   $model = $this::find()->orderBy('uid DESC')->one();
    //   if($model){
    //     return $model->uid + 1;
    //   }else{
    //     return 1;
    //   }
    // }
    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if($insert){
    //           $this->created_at = date("Y-m-d h:i:s");
    //           $this->metadata = NULL;
    //           $this->settings = NULL;
    //           $this->uid =  $this::autoInCreament();
    //         }
    //         $this->updated_at = date("Y-m-d h:i:s");
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
