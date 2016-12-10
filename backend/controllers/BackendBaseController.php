<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/10/16
 * Time: 9:31 AM.
 */

namespace backend\controllers;

use common\controllers\CommonBaseController;
use common\modules\adminUser\business\BusinessAdminUser;
use common\Nexx;

class BackendBaseController extends CommonBaseController
{
    public $category;

    public function beforeAction($action)
    {
        $permission = BusinessAdminUser::getPermission();
        if (!$permission) {
            flassError('You are not allowed to perform this action.');
            Nexx::$app->response->redirect(['site/login'])->send();
            exit;
        }
        $headers = Nexx::$app->request->headers;
        if (isset($headers['viewinmodal'])) {
            $this->layout = false;
        }

        return parent::beforeAction($action);
    }
}
