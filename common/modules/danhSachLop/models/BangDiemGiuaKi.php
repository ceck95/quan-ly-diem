<?php

namespace common\modules\danhSachLop\models;

use Yii;

/**
 * This is the model class for table "bang_diem_giua_ki".
 *
 * @property integer $uid
 * @property string $ma_hoc_sinh
 * @property string $ma_lop
 * @property double $kiem_tra_mieng
 * @property double $kiem_tra_15_phut
 * @property double $kiem_tra_1_tiet
 * @property double $thi
 * @property double $diem_trung_binh
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class BangDiemGiuaKi extends \common\models\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bang_diem_giua_ki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_lop', 'kiem_tra_mieng', 'kiem_tra_15_phut', 'kiem_tra_1_tiet', 'thi', 'diem_trung_binh'], 'required'],
            [['ma_hoc_sinh', 'ma_lop'], 'string'],
            [['kiem_tra_mieng', 'kiem_tra_15_phut', 'kiem_tra_1_tiet', 'thi', 'diem_trung_binh'], 'number'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ma_hoc_sinh'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_hoc_sinh' => 'Ma Hoc Sinh',
            'ma_lop' => 'Ma Lop',
            'kiem_tra_mieng' => 'Kiem Tra Mieng',
            'kiem_tra_15_phut' => 'Kiem Tra 15 Phut',
            'kiem_tra_1_tiet' => 'Kiem Tra 1 Tiet',
            'thi' => 'Thi',
            'diem_trung_binh' => 'Diem Trung Binh',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
