<?php
namespace app\controllers;


use app\models\ValidateForm;
use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Configuration;
use app\models\Staff;
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



                return $this->redirect(\Yii::$app->urlManager->createUrl('upload/validate'), 302);
            }
        }


        return $this->render('upload', [
            'model' => $model,
        ]);

    }

    public function actionValidate()
    {
        $session = new Session();
        $session->open();
        $model = new ValidateForm();
        $saveConf = new Configuration();


        $staff = Staff::find()->all();
        $listData = ArrayHelper::map($staff,'id_staff', 'fio' );// выбирает из масиива ключ-значение


        if (Yii::$app->request->post('ValidateForm')) { // если была отправленна форма
            $array = Yii::$app->request->post('ValidateForm');
            $saveConf->date = $array['date'];
            $saveConf->invent_num_system = $array['inv_syst'];
            $saveConf->invent_num_monitor 	 = $array['inv_mon'];
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
            'memory'=> $session['memory'],
            'listData'=> $listData
        ]);

    }
}