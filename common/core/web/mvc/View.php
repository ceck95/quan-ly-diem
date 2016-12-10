<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 1/19/16
 * Time: 9:33 AM
 */

namespace common\core\web\mvc;


use common\Nexx;

class View extends \yii\web\View
{
    public $jsConstants = [];
    
    /**
     * @inheritdoc
     */
    public function render($view, $params = [], $context = null)
    {
        $params = array_merge(Nexx::$app->controller->actionParams, $params);
        return parent::render($view, $params, $context);
    }

}