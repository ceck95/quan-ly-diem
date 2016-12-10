<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-27T12:13:00+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-27T21:18:08+07:00

namespace common\modules\danhSachLop\models;

/**
 * This is the model class for table "lop".
 *
 * @property int $uid
 * @property string $ma_lop
 * @property string $ten
 * @property int $so_hoc_sinh
 * @property int $khoi
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Lop extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt.lop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_lop', 'ten'], 'string'],
            [['ten', 'khoi'], 'required'],
            [['so_hoc_sinh', 'khoi', 'status', 'created_by', 'updated_by'], 'integer'],
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
            'ma_lop' => 'Mã lớp',
            'ten' => 'Tên',
            'so_hoc_sinh' => 'Số học sinh',
            'khoi' => 'Khối',
            'status' => 'Trạng thái',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
