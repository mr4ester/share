<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class AddStaff extends Model{
    public $name;
    public $surname;
    public $patronymic;

    public function rules(){
        return [
            ['name', 'required', 'message' => 'Введите Имя сотрудника'],
            ['surname','required', 'message'=>'Введите Фамилию сотрудника'],
            ['patronymic','required', 'message'=>'Введите Отчество сотрудника'],
        ];
    }

}
class Staff extends ActiveRecord{

}