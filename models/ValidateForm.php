<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class ValidateForm extends Model
{
    public $inv_mon;
    public $inv_syst;
    public $invent_print;
    public $staff;
    public $cpu;
    public $gpu;
    public $motherboard;
    public $monitor;
    public $monitor2;
    public $hdd1;
    public $hdd2;
    public $mac;
    public $printer1;
    public $printer2;
    public $printer3;
    public $printer4;
    public $printer5;
    public $printer6;
    public $printer7;
    public $printer8;
    public $printer9;
    public $printer10;

    public function rules()
    {
        return [
            [['staff'], 'required', 'message'=>'Выберете сотрудника! Если его нет в списке, необходимо сначала добавить его!'],
        ];
    }
}
class Configuration extends ActiveRecord{

}
