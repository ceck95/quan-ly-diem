<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/6/16
 * Time: 2:11 PM
 */

namespace common\modules\file\widgets;

use yii\base\Widget;
use common\modules\file\business\BusinessFile;

class FileUploadWidget extends Widget
{
    public $form;
    
    public $sourceModel;
    
    public $attr;
    
    public $options = [];
    
    public function run()
    {
        return $this->render('file_upload_widget', [
            'form' => $this->form,
            'sourceModel' => $this->sourceModel,
            'attr' => $this->attr,
            'options' => $this->options,
        ]);
    }

}