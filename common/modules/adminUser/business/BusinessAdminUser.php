<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-30T15:59:08+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-30T16:08:47+07:00

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/9/16
 * Time: 4:09 PM.
 */

namespace common\modules\adminUser\business;

use common\modules\adminUser\models\RoleRight;
use common\Nexx;
use common\utilities\Common;
use common\utilities\ArraySimple;

class BusinessAdminUser
{
    private static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public static function getPermission()
    {
        $loggedUser = Nexx::$app->user->getIdentity();
        $currentUrl = Nexx::$app->request->url;
        $excludeRequireLogin = ['/site/login', '/site/logout', '/'];
        $sAdminUserName = '1';
        if (in_array($currentUrl, $excludeRequireLogin)) {
            return true;
        }
        if ($loggedUser) {
            if ($sAdminUserName == $loggedUser->role_id) {
                return true;
            } else {
                $roleId = $loggedUser->role_id;
                $roleRightObj = new RoleRight();

                $currentModule = Nexx::$app->controller->module->id;
                if (empty(Nexx::$app->getModule($currentModule))) {
                    $currentModule = false;
                }
                $currentController = Common::getClassName(Nexx::$app->controller->className());
                $currentAction = str_replace('action', '', Nexx::$app->controller->action->actionMethod);
                if ($currentAction == 'Profile' || $currentAction == 'ChangePassword') {
                    return true;
                } else {
                    $roleRight = $roleRightObj->getPermission($roleId, $currentModule, $currentController, $currentAction);
                    if ($roleRight) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    private static $_rightsOfRole;

    public static function getProvidedActions($roleId = null)
    {
        $rightsOfRole = RoleRight::find()
            ->select(['module', 'controller', 'action'])
            ->andWhere(['role_id' => $roleId])
            ->all();
        if (self::$_rightsOfRole === null) {
            self::$_rightsOfRole = Nexx::createObject(ArraySimple::makeKeyPathRecursive($rightsOfRole, ['module',
                'controller',
                'action', ]));
        }

        return self::$_rightsOfRole;
    }

    public function isSuperAdmin()
    {
        $iden = Nexx::$app->user->getIdentity();

        return $iden && $iden->id === 1;
    }

    public function isAdmin()
    {
        $iden = Nexx::$app->user->getIdentity();

        return $iden && $iden->role_id === 1;
    }
}
