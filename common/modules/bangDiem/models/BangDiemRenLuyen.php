<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T09:42:02+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:55:45+07:00

namespace common\modules\bangDiem\models;

/**
 * This is the model class for table "bang_diem_ren_luyen".
 *
 * @property int $uid
 * @property string $ma_hoc_sinh
 * @property string $ten_hoc_sinh
 * @property int $diem_ren_luyen
 * @property string $loai_hanh_kiem
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class BangDiemRenLuyen extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.bang_diem_ren_luyen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_lop', 'diem_ren_luyen', 'loai_hanh_kiem'], 'required'],
            [['ma_hoc_sinh', 'ma_lop', 'loai_hanh_kiem'], 'string'],
            [['ma_hoc_sinh', 'ma_lop'], 'unique', 'targetAttribute' => ['ma_hoc_sinh', 'ma_lop']],
            [['created_by', 'updated_by', 'status'], 'integer'],
            [['diem_ren_luyen'], 'integer', 'max' => 100],
            [['created_at', 'updated_at', 'ten_hoc_sinh', 'ten_lop'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_hoc_sinh' => 'Mã học sinh',
            'ma_lop' => 'Mã lớp',
            'ten_hoc_sinh' => 'Tên học sinh',
            'ten_lop' => 'Tên lớp',
            'diem_ren_luyen' => 'Điểm rèn luyện',
            'loai_hanh_kiem' => 'Loại hạnh kiểm',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
        ];
    }
}
