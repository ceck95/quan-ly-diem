<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T10:59:18+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-26T11:45:55+07:00

namespace common\models;

/**
 * This is the model class for table "nhan_vien".
 *
 * @property int $uid
 * @property string $ma_nhan_vien
 * @property int $role_id
 * @property string $ten_nhan_vien
 * @property string $gioi_tinh
 * @property string $ngay_sinh
 * @property string $dia_chi
 * @property string $email
 * @property string $sdt
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $status
 */
class NhanVien extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.nhan_vien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_nhan_vien', 'ten_nhan_vien', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'email', 'sdt'], 'string'],
            [['role_id', 'ten_nhan_vien', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'email', 'sdt'], 'required'],
            [['role_id', 'created_by', 'updated_by', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sdt'], 'unique'],

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_nhan_vien' => 'Mã nhân viên',
            'role_id' => 'Role ID',
            'ten_nhan_vien' => 'Tên nhân viên',
            'gioi_tinh' => 'Giới tính',
            'ngay_sinh' => 'Ngày sinh',
            'dia_chi' => 'Địa chỉ',
            'email' => 'Email',
            'sdt' => 'Số điện thoại',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Trạng thái',
        ];
    }
}
