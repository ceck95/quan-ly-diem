<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T11:25:31+07:00

namespace common\models;

/**
 * This is the model class for table "giao_vien".
 *
 * @property int $uid
 * @property string $ma_giao_vien
 * @property int $role_id
 * @property string $ten_giao_vien
 * @property string $gioi_tinh
 * @property string $sdt
 * @property string $ma_lop_giang_day
 * @property string $ma_lop_chu_nhiem
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class GiaoVien extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.giao_vien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_giao_vien', 'ten_giao_vien', 'gioi_tinh', 'sdt', 'ma_lop_chu_nhiem'], 'string'],
            [['role_id', 'email', 'ten_giao_vien', 'ma_mon_giang_day', 'ma_lop_giang_day', 'ngay_sinh', 'gioi_tinh', 'sdt'], 'required'],
            [['role_id', 'created_by', 'updated_by', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sdt', 'email'], 'unique'],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_giao_vien' => 'Mã giáo viên',
            'role_id' => 'Chức vụ',
            'ten_giao_vien' => 'Tên giáo viên',
            'gioi_tinh' => 'Giới tính',
            'sdt' => 'Số điện thoại',
            'ngay_sinh' => 'Ngày sinh',
            'email' => 'Email',
            'ma_lop_giang_day' => 'Mã lớp giảng dạy',
            'ma_lop_chu_nhiem' => 'Mã lớp chủ nhiệm',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Trạng thái',
            'ma_mon_giang_day' => 'Mã môn giảng dạy',
        ];
    }
}
