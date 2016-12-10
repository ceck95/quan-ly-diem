<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dtaxi.customer_notification".
 *
 * @property integer $uid
 * @property string $title
 * @property string $message
 * @property integer $user_id
 * @property string $type
 * @property integer $subject_id
 * @property string $subject_type
 * @property boolean $is_read
 * @property string $metadata
 * @property string $created
 * @property integer $status
 */
class CustomerNotification extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hc.customer_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'user_id', 'subject_id', 'status'], 'integer'],
            [['title', 'message', 'type', 'subject_type', 'metadata'], 'string'],
            [['is_read'], 'boolean'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', 'Uid'),
            'title' => Yii::t('app', 'Title'),
            'message' => Yii::t('app', 'Message'),
            'user_id' => Yii::t('app', 'User ID'),
            'type' => Yii::t('app', 'Type'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'subject_type' => Yii::t('app', 'Subject Type'),
            'is_read' => Yii::t('app', 'Is Read'),
            'metadata' => Yii::t('app', 'Metadata'),
            'created' => Yii::t('app', 'Created'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
