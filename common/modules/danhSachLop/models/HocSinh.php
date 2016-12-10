<?php

namespace common\modules\danhSachLop\models;

/**
 * This is the model class for table "hoc_sinh".
 *
 * @property int $uid
 * @property string $ma_hoc_sinh
 * @property string $ho_ten
 * @property string $gioi_tinh
 * @property string $ngay_sinh
 * @property string $dan_toc
 * @property string $ton_giao
 * @property string $dia_chi
 * @property string $ma_phu_huynh
 * @property string $sdt
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class HocSinh extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.hoc_sinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_hoc_sinh', 'ho_ten', 'gioi_tinh', 'ngay_sinh', 'dan_toc', 'ton_giao', 'dia_chi', 'ma_phu_huynh', 'sdt'], 'string'],
            [['ho_ten', 'ma_lop', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'ma_phu_huynh'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
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
            'ho_ten' => 'Họ tên',
            'gioi_tinh' => 'Giới tính',
            'ngay_sinh' => 'Ngày sinh',
            'dan_toc' => 'Dân tộc',
            'ton_giao' => 'Tôn giáo',
            'dia_chi' => 'Địa chỉ',
            'ma_phu_huynh' => 'Mã phụ huynh',
            'sdt' => 'Số điện thoại',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'ma_lop' => 'Mã lớp',
            'status' => 'Trạng thái',
        ];
    }
}
