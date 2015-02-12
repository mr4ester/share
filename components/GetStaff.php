<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Staff;
use \app\models\Department;


class GetStaff extends Widget
{
    public $message;
    public $listData;
    public $staff;
    public $department;

    public function init()
    {
        parent::init();
        $model = new Staff(); 
        $this->department = Department::find()->asArray()->all();
        //$listData = ArrayHelper::map($this->staff,'id_staff', 'fio' );
        $this->listData .= '<div onclick="tree_toggle(arguments[0])">';
        foreach ($this->department as $arr) {
            $this->listData .= '<ul class="Container-tree">
                                 <li class="Node IsRoot ExpandClosed">
                                 <div class="Expand"></div>
                                 <div class="Content">' . $arr['department'] . '</div>';

            $staff = Staff::find()->where(['id_department' => $arr['id_department']])->asArray()->all();
            foreach ($staff as $value) {

                $this->listData .= '<ul class="Container-tree">
                                <li class="Node ExpandLeaf IsLast">
                                <div class="Expand"></div>
                                <div class="Content">' . $value['fio'] .
                    '</div></li></ul>';

            }
            $this->listData .= '</li></ul>';

        }
        $this->listData .= '</div>';


    }

    public function run()
    {

        return $this->listData;
    }
}