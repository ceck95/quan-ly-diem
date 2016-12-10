<?php
/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/9/16
 * Time: 4:08 PM
 */

namespace common\models;


use common\Nexx;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
class BaseModelWithoutAutoField extends ActiveRecord
{
    public $emptyField;
    /**
     * override insert & update method (add created_by, created_at, updated_by, updated_at attributes value)
     * @param bool|true $runValidation
     * @param null $attributeNames
     * @return bool
     */
    public function uploadfile($imageFile,$bonusName = null){
      $getImageFile = $imageFile[0];
      if($getImageFile){
        if($bonusName){
          $nameFile = 'uploads/' .$bonusName . $getImageFile->baseName . '.' . $getImageFile->extension;
          $getImageFile->saveAs($nameFile);
          return '/'.$nameFile;
        }else{
          $nameFile = 'uploads/' .$getImageFile->baseName . '.' . $getImageFile->extension;
          $getImageFile->saveAs($nameFile);
          return '/'.$nameFile;
        }
      }
    }

}
