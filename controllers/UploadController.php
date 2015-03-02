<?php
namespace app\controllers;


use app\models\SearchMonitors;
use app\models\ValidateForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Configuration;
use app\models\Staff;
use app\models\Monitors;
use app\models\Printers;
use app\models\BriefConfiguration;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\web\Response;
use yii\helpers\ArrayHelper;


class UploadController extends Controller
{
    public $data;


    public function actionUpload()
    {
        $array = array(
            'тип цп' => '',
            'системная плата' => '',
            'видеоадаптер1' => '',
            'монитор1' => '',
            'монитор2' => '',
            'дисковый накопитель1' => '',
            'дисковый накопитель2' => '',
            'дисковый накопитель3' => '',
            'дисковый накопитель4' => '',
            'дисковый накопитель5' => '',
            'первичный адрес mac' => '',
            'принтер1' => '',
            'принтер2' => '',
            'принтер3' => '',
            'принтер4' => '',
            'принтер5' => '',
            'принтер6' => '',
            'принтер7' => '',
            'принтер8' => '',
            'принтер9' => '',
            'принтер10' => '',
        );
        $mem = array(
            'имя модуля' => array(
                'модуль1' => '',
                'модуль2' => '',
                'модуль3' => '',
                'модуль4' => ''),
            'размер модуля' => array(
                'модуль1' => '',
                'модуль2' => '',
                'модуль3' => '',
                'модуль4' => ''),
            'скорость памяти' => array(
                'модуль1' => '',
                'модуль2' => '',
                'модуль3' => '',
                'модуль4' => ''),
        );
        $model = new UploadForm();
        $session = new Session();


        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');


            if ($model->file && $model->validate()) {


                $file = fopen($model->file->tempName, 'r');
                $count = 0;
                while ($count++ < 900) {
                    $data = fgets($file, 1024); // считываем построчно весь файл

                    /* так как файлы с конфигурацией в кодировке windows-1251, то */
                    $data = iconv('windows-1251', 'UTF-8', $data); //меняем  кодировку на utf8

                    @list($names, $inf, $info) = explode("|", $data);// знак @ предотвращяет ошибку
                    @list($type, $equipment) = explode("=", $inf);  //а она вылазит когда функция explode возращает строку
                    @list($name, $types) = explode("=", $info); //в который нет трех слов, результат list() выбрасывает ошибку

                    foreach ($array as $key => $value) {
                        if (mb_strtolower($type, 'UTF-8') == $key) {
                            $array[$key] = $equipment;
                        }
                        if ((mb_strtolower(substr($names, 0, 3), 'UTF-8') == 'spd')) {
                            foreach ($mem as $keys => $values) {
                                if (mb_strtolower($name, 'UTF-8') == $keys) {
                                    switch (substr($names, -1)) {
                                        case '1':
                                            $mem[$keys]['модуль1'] = $types;
                                            break;

                                        case '2':
                                            $mem[$keys]['модуль2'] = $types;
                                            break;

                                        case '3':
                                            $mem[$keys]['модуль3'] = $types;
                                            break;

                                        case '4':
                                            $mem[$keys]['модуль4'] = $types;
                                            break;

                                    }
                                }

                            }
                        }

                    }


                }
                $session->open();
                $session['config'] = $array;
                $session['memory'] = $mem;


                return $this->redirect(['upload/monitors']);

            }
        }


        return $this->render('upload', [
            'model' => $model,
        ]);

    }

    public function actionMonitors()
    {
        $model = new Monitors();
        $session = new Session();

        if ($array = Yii::$app->request->post()) {
            $id_staff = ArrayHelper::remove($array['Monitors'], 'staff');
            $model->load($array);
            $model->save();
            $key = $model->getPrimaryKey(); //получаем последний id конфигурации
            $updateStaff = Staff::findOne($id_staff); // делаем запрос к таблице сотрудники, с id выбранным в форме
            $updateStaff->id_monitor = $key;// добавляем id конфигурации к выбранному сотруднику
            $updateStaff->save(); // и обновляем запись в базе данных
            return $this->redirect(['upload/configuration', 'id' => $id_staff]);
        }

        $staff = Staff::find()->all();
        $listData = ArrayHelper::map($staff, 'id_staff', 'fio');// выбирает из масиива ключ-значение

        $model->attributes = [      //заполняем атрибуты модели данными из массива

            'id_monitor' => '',
            'invent_num_monitor_1' => '',
            'invent_num_monitor_2' => '',
            'monitor_1' => $session['config']['монитор1'],
            'monitor_2' => $session['config']['монитор2'],
            'date_1' => '',
            'date_2' => '',
            'old_staff_1' => '{0}',
            'old_staff_2' => '{0}',];

        return $this->render('/monitors/create', [
            'model' => $model,
            'listData' => $listData,
        ]);

    }


    public function actionConfiguration()
    {
        $model = new Configuration();
        $session = new Session();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $key = $model->getPrimaryKey(); //получаем последний id конфигурации
            $updateStaff = Staff::findOne(Yii::$app->request->get('id')); // делаем запрос к таблице сотрудники, с id выбранным в форме
            $updateStaff->id_configuration = $key;// добавляем id конфигурации к выбранному сотруднику
            $updateStaff->save(); // и обновляем запись в базе данных
            return $this->redirect(['upload/printers', 'id' => Yii::$app->request->get('id')]);
        }

        /* переберем массив с RAM чтоб задать полям значения по дефолту если планка отсутсвует */
        $ram = [1 => '', 2 => '', 3 => '', 4 => '']; // массив для хранения

        foreach ($session['memory'] as $key => $value) { //перебираем основной массив $key = 'имя модуля' $value = [модуль1],[модуль2]...
            $count = 0;                                 //счетчик
            foreach ($value as $key2 => $value2) {  // перебираем значения
                $count++;
                if ($value2 !== '') {   // если мадуль1, модуль2 не пустой, присваеваем значение. И так в цикле получаем
                    $ram[$count] .= '(' . $value2 . ')' . ' '; // строку вида (Kingston 99U5474-013.A00LF) (2 Гб (1 rank, 8 banks)) (DDR3-1333 (667 МГц))
                }
            }
        }

        $model->attributes = [                  //заполняем модель данными
            'cpu' => $session['config']['тип цп'],
            'motherboard' => $session['config']['системная плата'],
            'graphics' => $session['config']['видеоадаптер1'],
            'hdd_1' => $session['config']['дисковый накопитель1'],
            'hdd_2' => $session['config']['дисковый накопитель2'],
            'memory_1' => $ram[1],
            'memory_2' => $ram[2],
            'memory_3' => $ram[3],
            'memory_4' => $ram[4],
            'mac' => $session['config']['первичный адрес mac'],
            'date' => '',
        ];
        return $this->render('/configuration/create', [
            'model' => $model,
        ]);
    }


    public function actionPrinters()
    {
        $model = new Printers();
        $session = new Session();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $key = $model->getPrimaryKey(); //получаем последний id конфигурации
            $updateStaff = Staff::findOne(Yii::$app->request->get('id')); // делаем запрос к таблице сотрудники, с id выбранным в форме
            $updateStaff->id_printer = $key;// добавляем id конфигурации к выбранному сотруднику
            $updateStaff->save(); // и обновляем запись в базе данных
            return $this->redirect(Yii::$app->homeUrl, 302);
        }


        $model->attributes = [
            'print_1' => $session['config']['принтер1'],
            'print_2' => $session['config']['принтер2'],
            'print_3' => $session['config']['принтер3'],
            'print_4' => $session['config']['принтер4'],
            'print_5' => $session['config']['принтер5'],
            'print_6' => $session['config']['принтер6'],
            'print_7' => $session['config']['принтер7'],
            'print_8' => $session['config']['принтер8'],
            'print_9' => $session['config']['принтер9'],
            'print_10' => $session['config']['принтер10'],
        ];

        return $this->render('/printers/create', [
            'model' => $model
        ]);
    }


    public function actionValidate()
    {
        $session = new Session();
        $session->open();
        $model = new ValidateForm();
        $saveConf = new Configuration();


        $staff = Staff::find()->all();
        $listData = ArrayHelper::map($staff, 'id_staff', 'fio');// выбирает из масиива ключ-значение


        if (Yii::$app->request->post('ValidateForm')) { // если была отправленна форма
            $array = Yii::$app->request->post('ValidateForm');
            $saveConf->date = $array['date'];
            $saveConf->invent_num_system = $array['inv_syst'];
            $saveConf->invent_num_monitor = $array['inv_mon'];
            $saveConf->invent_num_printer = $array['invent_print'];
            $saveConf->cpu = $array['cpu'];
            $saveConf->motherboard = $array['motherboard'];
            $saveConf->graphics = $array['gpu'];
            $saveConf->mac = $array['mac'];
            $saveConf->memory_1 = $array['mem1'];
            if (isset($array['mem2'])) {          //условия потому что, если в виде отсутсвуют
                $saveConf->memory_2 = $array['mem2']; // поля то в массиве POST отсутсвуют
            }                                          // ключи значения которых мы берем
            if (isset($array['mem3'])) {                //и как результат ошибка
                $saveConf->memory_3 = $array['mem3'];
            }
            if (isset($array['mem4'])) {
                $saveConf->memory_4 = $array['mem4'];
            }
            $saveConf->monitor_1 = $array['monitor'];
            if (isset($array['monitor2'])) {
                $saveConf->monitor_2 = $array['monitor2'];
            }
            $saveConf->hdd_1 = $array['hdd1'];
            $saveConf->hdd_2 = $array['hdd2'];
            $saveConf->print_1 = $array['printer1'];
            if (isset($array['printer2'])) {
                $saveConf->print_2 = $array['printer2'];
            }
            if (isset($array['printer3'])) {
                $saveConf->print_3 = $array['printer3'];
            }
            if (isset($array['printer4'])) {
                $saveConf->print_4 = $array['printer4'];
            }
            if (isset($array['printer5'])) {
                $saveConf->print_5 = $array['printer5'];
            }
            if (isset($array['printer6'])) {
                $saveConf->print_6 = $array['printer6'];
            }
            if (isset($array['printer7'])) {
                $saveConf->print_7 = $array['printer7'];
            }
            if (isset($array['printer8'])) {
                $saveConf->print_8 = $array['printer8'];
            }
            if (isset($array['printer9'])) {
                $saveConf->print_9 = $array['printer9'];
            }
            if (isset($array['printer10'])) {
                $saveConf->print_10 = $array['printer10'];
            }
            $saveConf->save(); //сохраняем конфигурацию
            $key = $saveConf->getPrimaryKey(); //получаем последний id конфигурации
            $updateStaff = Staff::findOne($array['staff']); // делаем запрос к таблице сотрудники, с id выбранным в форме
            $updateStaff->id_configuration = $key;// добавляем id конфигурации к выбранному сотруднику
            $updateStaff->update(); // и обновляем запись в базе данных
            return $this->redirect(Yii::$app->homeUrl, 302);

        }


        if ($model->validate()) {
            return $this->render('validate', ['model' => $model, 'message' => $message]);
        }

        return $this->render('validate', [
            'model' => $model,
            'config' => $session['config'],
            'memory' => $session['memory'],
            'listData' => $listData
        ]);

    }
}