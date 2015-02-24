<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property integer $id_configuration
 * @property string $invent_num_system
 * @property string $cpu
 * @property string $motherboard
 * @property string $graphics
 * @property string $hdd_1
 * @property string $hdd_2
 * @property string $memory_1
 * @property string $memory_2
 * @property string $memory_3
 * @property string $memory_4
 * @property string $mac
 * @property string $date
 * @property string $old_staff
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
            [['id_configuration','old_staff'], 'integer'],
            [['invent_num_system', 'cpu', 'motherboard', 'graphics', 'hdd_1', 'hdd_2', 'memory_1', 'memory_2', 'memory_3', 'memory_4', 'mac','date'], 'string']
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
            'cpu' => 'Cpu',
            'motherboard' => 'Motherboard',
            'graphics' => 'Graphics',
            'hdd_1' => 'Hdd 1',
            'hdd_2' => 'Hdd 2',
            'memory_1' => 'Memory 1',
            'memory_2' => 'Memory 2',
            'memory_3' => 'Memory 3',
            'memory_4' => 'Memory 4',
            'mac' => 'Mac',
            'date' => 'Дата поступления',
            'old_staff'=> 'Бывший сотрудник',
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
