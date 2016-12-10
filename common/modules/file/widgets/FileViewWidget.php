<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/6/16
 * Time: 3:40 PM
 */

namespace common\modules\files\widgets;


use common\modules\file\business\BusinessFile;
use yii\base\Widget;

class FileView extends Widget
{
    public $model;
    
    public $field;

    public function run()
    {
        return $this->render('file_view_widget', [
            'model' => $this->model,
            'field' => $this->field,
        ]);
    }


}