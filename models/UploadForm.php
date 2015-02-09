<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;
    public $temp;
    public $contents;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file',],
        ];
    }
}
class Configuration extends ActiveRecord{

}

