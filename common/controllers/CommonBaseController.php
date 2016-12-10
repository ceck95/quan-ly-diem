<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/10/16
 * Time: 8:43 AM.
 */

namespace common\controllers;

use common\Nexx;
use yii\web\Controller;

class CommonBaseController extends Controller
{
    const PASSWORD_DEFAULT = '12345';

    public function getPostObject($path = '')
    {
        if (empty($path)) {
            $post = \Yii::$app->request->post();
        } else {
            $post = \Yii::$app->request->post($path);
        }

        return Nexx::createObject($post);
    }
}
