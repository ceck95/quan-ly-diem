<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/16/16
 * Time: 2:50 PM
 */

namespace common\core\web\mvc\widget;

use common\models\BaseModel;
use yii\base\InvalidParamException;
use yii\widgets\DetailView;

class NexxDetailView extends DetailView
{
    protected function normalizeAttributes() {
        $labels = $this->model->attributeLabels();
        foreach ($this->attributes as $field => &$attribute) {
            if (is_array($attribute) && !isset($attribute['label'])) {
                if ($this->model instanceof BaseModel) {
                    if (!isset($labels[$field])) {
                        throw new InvalidParamException("Label '$field' must be defined in " . get_class($this->model) . "::attributeLabels()");
                    }
                }
                $attribute['label'] = $labels[$field];
                $attribute['format'] = 'raw';
            }
        }
        return parent::normalizeAttributes();
    }


}