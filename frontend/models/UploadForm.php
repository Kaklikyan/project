<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageFile1;
    public $imageFile2;
    public $imageFile3;
    public $imageFile4;
    public $imageFile5;
    public $imageFile6;
    public $imageFile7;
    public $imageFile8;
    public $imageFile9;
    public $imageFile10;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(\Yii::getAlias('@webroot/') . '/images/qq/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>