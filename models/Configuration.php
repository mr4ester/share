<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property integer $id_configuration
 * @property string $invent_num_system
 * @property string $invent_num_monitor
 * @property string $invent_num_printer
 * @property string $cpu
 * @property string $motherboard
 * @property string $graphics
 * @property string $monitor_1
 * @property string $monitor_2
 * @property string $hdd_1
 * @property string $hdd_2
 * @property string $memory_1
 * @property string $memory_2
 * @property string $memory_3
 * @property string $memory_4
 * @property string $mac
 * @property string $print_1
 * @property string $print_2
 * @property string $print_3
 * @property string $print_4
 * @property string $print_5
 * @property string $print_6
 * @property string $print_7
 * @property string $print_8
 * @property string $print_9
 * @property string $print_10
 * @property string $date
 *
 * @property Staff[] $staff
 */
class Configuration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invent_num_system', 'invent_num_monitor', 'invent_num_printer', 'cpu', 'motherboard', 'graphics', 'monitor_1', 'monitor_2', 'hdd_1', 'hdd_2', 'memory_1', 'memory_2', 'memory_3', 'memory_4', 'mac', 'print_1', 'print_2', 'print_3', 'print_4', 'print_5', 'print_6', 'print_7', 'print_8', 'print_9', 'print_10','date'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_configuration' => 'id',
            'invent_num_system' => 'Инв№ сист. блока',
            'invent_num_monitor' => 'Инв№ монитора',
            'invent_num_printer' => 'Инв№ принтера',
            'cpu' => 'Cpu',
            'motherboard' => 'Motherboard',
            'graphics' => 'Graphics',
            'monitor_1' => 'Монитор 1',
            'monitor_2' => 'Монитор 2',
            'hdd_1' => 'Hdd 1',
            'hdd_2' => 'Hdd 2',
            'memory_1' => 'Memory 1',
            'memory_2' => 'Memory 2',
            'memory_3' => 'Memory 3',
            'memory_4' => 'Memory 4',
            'mac' => 'Mac',
            'print_1' => 'Print 1',
            'print_2' => 'Print 2',
            'print_3' => 'Print 3',
            'print_4' => 'Print 4',
            'print_5' => 'Print 5',
            'print_6' => 'Print 6',
            'print_7' => 'Print 7',
            'print_8' => 'Print 8',
            'print_9' => 'Print 9',
            'print_10' => 'Print 10',
            'date' => 'Дата поступления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['id_configuration' => 'id_configuration']);
    }
}
