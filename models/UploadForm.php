<?php 

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;
    public $path;
    public $file_type;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->path =Yii::getAlias('@webroot');
            $this->file->saveAs($this->path . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->file->baseName . '.' . $this->file->extension);
            $this->file_type = $this->file->extension;
            return $this->file->baseName . '.' . $this->file->extension;
        } else {
            return NULL;
        }
    }
}