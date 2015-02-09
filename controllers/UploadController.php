<?php
namespace app\controllers;


use app\models\ValidateForm;
use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Configuration;
use yii\web\UploadedFile;
use yii\web\Session;
use yii\web\Response;


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

                    @list($names, $inf, $info) = explode("|", $data);
                    @list($type, $equipment) = explode("=", $inf);
                    @list($name, $types) = explode("=", $info);

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
        $configuration = new Configuration();

//        $configuration = Configuration::find()
//            ->indexBy('cpu')
//            ->one();

        if (Yii::$app->request->post('ValidateForm')) {
            $array = Yii::$app->request->post('ValidateForm');
            $configuration->invent_num_system = $array['inv_syst'];
            $configuration->invent_num_monitor 	 = $array['inv_mon'];
            $configuration->invent_num_printer = $array['invent_print'];
            $configuration->cpu = $array['cpu'];
            $configuration->motherboard = $array['motherboard'];
            $configuration->graphics = $array['gpu'];
            $configuration->memory_1 = $array['mem1'];
            if (isset($array['mem2'])) {
                $configuration->memory_2 = $array['mem2'];
            }
            if (isset($array['mem3'])) {
                $configuration->memory_3 = $array['mem3'];
            }
            if (isset($array['mem4'])) {
                $configuration->memory_4 = $array['mem4'];
            }
            $configuration->monitor_1 = $array['monitor'];
            if (isset($array['monitor2'])) {
                $configuration->monitor_2 = $array['monitor2'];
            }
            $configuration->hdd_1 = $array['hdd1'];
            $configuration->hdd_2 = $array['hdd2'];
            $configuration->print_1 = $array['printer1'];
            if (isset($array['printer2'])) {
                $configuration->print_2 = $array['printer2'];
            }
            if (isset($array['printer3'])) {
                $configuration->print_3 = $array['printer3'];
            }
            if (isset($array['printer4'])) {
                $configuration->print_4 = $array['printer4'];
            }
            if (isset($array['printer5'])) {
                $configuration->print_5 = $array['printer5'];
            }
            if (isset($array['printer6'])) {
                $configuration->print_6 = $array['printer6'];
            }
            if (isset($array['printer7'])) {
                $configuration->print_7 = $array['printer7'];
            }
            if (isset($array['printer8'])) {
                $configuration->print_8 = $array['printer8'];
            }
            if (isset($array['printer9'])) {
                $configuration->print_9 = $array['printer9'];
            }
            if (isset($array['printer10'])) {
            $configuration->print_10 = $array['printer10'];
             }
            $configuration->save();
        }


        if ($model->validate()) {
            return $this->render('validate', ['model' => $model, 'message' => $message]);
        }

        return $this->render('validate', [
            'model' => $model,
            'config' => $session['config'],
            'memory'=> $session['memory']
        ]);

    }
}