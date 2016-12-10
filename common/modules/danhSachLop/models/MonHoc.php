<?php

namespace common\modules\danhSachLop\models;

/**
 * This is the model class for table "mon_hoc".
 *
 * @property int $uid
 * @property string $ma_mon_hoc
 * @property string $ten_mon_hoc
 * @property int $he_so_mon
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class MonHoc extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.mon_hoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_mon_hoc', 'ten_mon_hoc'], 'string'],
            [['ten_mon_hoc', 'he_so_mon'], 'required'],
            [['he_so_mon', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_mon_hoc' => 'Mã môn học',
            'ten_mon_hoc' => 'Tên môn học',
            'he_so_mon' => 'Hệ số môn học',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
