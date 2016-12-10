<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-24T22:25:55+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T11:21:15+07:00

namespace backend\business;

use common\business\BaseBusinessPublisher;
use common\modules\adminUser\models\User;

class BusinessAddUser extends BaseBusinessPublisher
{
    private static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function addUser($data = [])
    {
        $checkUser = User::find()->andWhere(['username' => $data['User']['username']])->one();
        $checkUserEmail = User::find()->andWhere(['email' => $data['User']['email']])->one();
        if ($checkUser || $checkUserEmail) {
            return false;
        } else {
            $modelUser = new User();
            $modelUser->load($data);
            $modelUser->setPassword($data['User']['password_hash']);
            $modelUser->save(false);

            return true;
        }
    }
}
