<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T14:25:14+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-24T23:35:41+07:00

namespace common\models;

/**
 * This is the model class for table "phu_huynh".
 *
 * @property int $uid
 * @property string $ma_phu_huynh
 * @property int $role_id
 * @property string $ten_phu_huynh
 * @property string $gioi_tinh
 * @property string $ngay_sinh
 * @property string $dia_chi
 * @property string $cmnd
 * @property string $email
 * @property int $status
 * @property string $sdt
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class PhuHuynh extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.phu_huynh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_phu_huynh', 'ten_phu_huynh', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'cmnd', 'sdt'], 'string'],
            [['role_id', 'ten_phu_huynh', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'email', 'sdt'], 'required'],
            [['role_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['email'], 'email'],
            [['created_at', 'updated_at'], 'safe'],
            [['sdt'], 'unique'],
            [['sdt'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'ma_phu_huynh' => 'Mã phụ huynh',
            'role_id' => 'Chức vụ',
            'ten_phu_huynh' => 'Tên phụ huynh',
            'gioi_tinh' => 'Giới tính',
            'ngay_sinh' => 'Ngày sinh',
            'dia_chi' => 'Địa chỉ',
            'cmnd' => 'CMND',
            'email' => 'Email',
            'status' => 'Trạng thái',
            'sdt' => 'SĐT',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
