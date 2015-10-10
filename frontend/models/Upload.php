<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
class Upload extends Model
{
    /**
     * @var UploadedFile
     * $this->imageFile->baseName
     */

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp'],
        ];
    }

    public function upload($filename)
    {
        if ($this->validate()) {
            $uid=Yii::$app->user->id;
            if (!is_dir('Uploads/'. $uid.'/')) mkdir('Uploads/'. $uid.'/');
            $this->imageFile->saveAs('Uploads/'. $uid.'/'. $filename . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}