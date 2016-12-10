<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T09:41:38+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:56:42+07:00

namespace common\modules\bangDiem\models;

/**
 * This is the model class for table "bang_diem_tong_ket".
 *
 * @property int $uid
 * @property string $ma_hoc_sinh
 * @property string $ma_lop
 * @property float $diem_trung_binh_hk1
 * @property float $diem_trung_binh_hk2
 * @property float $diem_trung_binh_ca_nam
 * @property string $loai_hanh_kiem
 * @property string $xep_loai
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class BangDiemTongKet extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.bang_diem_tong_ket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_lop', 'diem_trung_binh_hk1', 'diem_trung_binh_hk2', 'diem_trung_binh_ca_nam', 'loai_hanh_kiem', 'xep_loai'], 'required'],
            [['ma_hoc_sinh', 'ma_lop', 'loai_hanh_kiem', 'xep_loai'], 'string'],
            [['diem_trung_binh_hk1', 'diem_trung_binh_hk2', 'diem_trung_binh_ca_nam'], 'number'],
            [['created_at', 'updated_at', 'ten_hoc_sinh', 'ten_lop'], 'safe'],
            [['ma_hoc_sinh', 'ma_lop'], 'unique', 'targetAttribute' => ['ma_hoc_sinh', 'ma_lop']],
            [['created_by', 'updated_by', 'status'], 'integer'],
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
            'diem_trung_binh_hk1' => 'Điểm trung bình HKI',
            'diem_trung_binh_hk2' => 'Điểm trung bình HKII',
            'diem_trung_binh_ca_nam' => 'Điểm trung bình cả năm',
            'loai_hanh_kiem' => 'Loại hạnh kiểm',
            'xep_loai' => 'Xếp loại',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
        ];
    }
}
