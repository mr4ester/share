<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "printers".
 *
 * @property integer $id_printer
 * @property string $invent_num_printer_1
 * @property string $invent_num_printer_2
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
 * @property string $date_1
 * @property string $date_2
 * @property string $old_staff_1
 * @property string $old_staff_2
 *
 * @property Staff[] $staff
 */
class Printers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'printers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invent_num_printer_1', 'invent_num_printer_2', 'print_1', 'print_2', 'print_3', 'print_4', 'print_5', 'print_6', 'print_7', 'print_8', 'print_9', 'print_10', 'date_1', 'date_2', 'old_staff_1', 'old_staff_2'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_printer' => 'Id Printer',
            'invent_num_printer_1' => 'Инв № принтер 1',
            'invent_num_printer_2' => 'Инв № принтер 2',
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
            'date_1' => 'Дата поступления',
            'date_2' => 'Дата поступления',
            'old_staff_1' => 'Old Staff 1',
            'old_staff_2' => 'Old Staff 2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['id_printer' => 'id_printer']);
    }
}
