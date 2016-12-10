<?php

/**
 * CreatedBy: thangcest2@gmail.com
 * Date: 6/14/16
 * Time: 4:03 PM
 */

namespace common\modules\file\business;

use common\models\BaseModel;
use common\modules\file\FileInfoObject;
use common\Nexx;
use common\utilities\Dir;
use yii\web\UploadedFile;

class BusinessFile
{
    public static function getStorageDomain()
    {
        $url = Nexx::$app->request->getHostInfo();

        return $url;
    }

    public static $inputRules = [
        'image' => 'png, jpeg, jpg, gif',
        'pdf'   => 'pdf',
        'excel' => 'xls, xlsx',
    ];

    private static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    /**
     * @param UploadedFile $uploadedFile
     * @param BaseModel $model
     * @param $attr
     * @return string $modelId-$attrName-timestamp.ext
     */
    protected function generateFileNameWithExt(UploadedFile $uploadedFile, BaseModel $model, $attr)
    {
        return $model->getAttribute('uid') . '-' . $attr . '-' . time() . '.' . $uploadedFile->extension;
    }

    public function moveToPath(UploadedFile $uploadedFile, BaseModel $model, $attr, $toPath)
    {
        $fileName = $this->generateFileNameWithExt($uploadedFile, $model, $attr);
        $diskPath = \Yii::getAlias('@backend/web/uploads') . $toPath;
        Dir::mkdirs($diskPath);
        $status = $uploadedFile->saveAs($diskPath . $fileName);
        if ($status) {
            $fileObject = new FileInfoObject(); 
            $fileObject->setData([
                'url'      => $this->getStorageDomain() . '/uploads' . $toPath . $fileName,
                'path'     => $diskPath . $fileName,
                'name' => $fileName,
                'ext'  => $uploadedFile->extension,
            ]);
            return $fileObject;
        }

        return false;
    }

    /**
     * Whether file is stored at local webservers or other storage service like amazons3 or googledrive
     * @param $relativePath
     * @param $fullUrlOldFile
     * @return $this
     */
    public function removeHardDiskStorage($relativePath, $fullUrlOldFile)
    {
        if (empty($fullUrlOldFile)) {
            return $this;
        }
        $fileNameArr = explode('/', $fullUrlOldFile);
        $fileName = $fileNameArr[count($fileNameArr)-1];

        $diskPath = \Yii::getAlias('@backend/web/uploads') . $relativePath . $fileName;
        if (file_exists($diskPath)) {
            unlink($diskPath);
        }

        return $this;
    }

}