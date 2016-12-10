<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T09:41:04+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T23:24:20+07:00

namespace common\modules\bangDiem\models;

/**
 * This is the model class for table "bang_diem_giua_ki".
 *
 * @property int $uid
 * @property string $ma_hoc_sinh
 * @property string $ma_lop
 * @property float $kiem_tra_mieng
 * @property float $kiem_tra_15_phut
 * @property float $kiem_tra_1_tiet
 * @property float $thi
 * @property float $diem_trung_binh
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class BangDiemGiuaKi extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.bang_diem_giua_ki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ma_lop', 'ma_mon', 'kiem_tra_mieng', 'kiem_tra_15_phut', 'kiem_tra_1_tiet', 'thi', 'diem_trung_binh'], 'required'],
            [['ma_hoc_sinh', 'ma_lop'], 'string'],
            [['kiem_tra_mieng', 'kiem_tra_15_phut', 'kiem_tra_1_tiet', 'thi', 'diem_trung_binh'], 'number'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['ma_hoc_sinh', 'ma_lop', 'ma_mon'], 'unique', 'targetAttribute' => ['ma_hoc_sinh', 'ma_lop', 'ma_mon']],
            [['created_at', 'updated_at', 'ten_hoc_sinh', 'ten_lop', 'ten_mon'], 'safe'],
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
            'ma_mon' => 'Mã môn',
            'ten_hoc_sinh' => 'Tên học sinh',
            'ten_lop' => 'Tên lớp',
            'ten_mon' => 'Tên môn',
            'kiem_tra_mieng' => 'Kiểm tra miệng',
            'kiem_tra_15_phut' => 'Kiểm tra 15 phút',
            'kiem_tra_1_tiet' => 'Kiểm tra 1 tiết',
            'thi' => 'Thi',
            'diem_trung_binh' => 'Điểm trung bình',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
