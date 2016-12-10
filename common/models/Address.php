<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dtaxi.address".
 *
 * @property integer $uid
 * @property string $address
 * @property string $ward
 * @property integer $ward_code
 * @property string $district
 * @property string $district_code
 * @property string $province
 * @property string $province_code
 * @property string $country_code
 * @property integer $location_id
 * @property integer $subject_id
 * @property integer $user_id
 * @property string $type
 * @property integer $parent_id
 * @property string $latitude
 * @property string $longitude
 * @property string $gis_geometry
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $metadata
 * @property integer $status
 * @property string $tsv
 */
class Address extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dtaxi.address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'ward_code', 'location_id', 'subject_id', 'user_id', 'parent_id', 'created_by', 'updated_by', 'status'], 'integer'],
            [['address', 'ward', 'district', 'district_code', 'province', 'province_code', 'country_code', 'type', 'gis_geometry', 'metadata', 'tsv'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', 'Uid'),
            'address' => Yii::t('app', 'Address'),
            'ward' => Yii::t('app', 'Ward'),
            'ward_code' => Yii::t('app', 'Ward Code'),
            'district' => Yii::t('app', 'District'),
            'district_code' => Yii::t('app', 'District Code'),
            'province' => Yii::t('app', 'Province'),
            'province_code' => Yii::t('app', 'Province Code'),
            'country_code' => Yii::t('app', 'Country Code'),
            'location_id' => Yii::t('app', 'Location ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'type' => Yii::t('app', 'Type'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'gis_geometry' => Yii::t('app', 'Gis Geometry'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'metadata' => Yii::t('app', 'Metadata'),
            'status' => Yii::t('app', 'Status'),
            'tsv' => Yii::t('app', 'Tsv'),
        ];
    }
}
