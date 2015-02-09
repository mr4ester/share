<?php
namespace app\controllers;

use app\models\AddDepartment;
use app\models\Department;
use app\models\Staff;
use app\models\AddStaff;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class AddController extends Controller
{

    public function actionDepartment()
    {
        $model = new AddDepartment();
        $saveDepartment = new Department();

        if(Yii::$app->request->post('AddDepartment')){
            $array = Yii::$app->request->post('AddDepartment');
            echo '<br><br><br><br><br>';
            print_r(Yii::$app->request->post('AddDepartment')['department']);
            $saveDepartment->department= $array['department'];

        }


        return $this->render('add-department' ,[
        'model'=> $model
        ]);

    }

    public function actionStaff()
    {
        $model = new AddStaff();
        $saveStaff = new Staff();
        if(Yii::$app->request->post('AddDepartment')) {
            $array = Yii::$app->request->post('AddDepartment');
            $saveStaff->name = $array['name'];
            $saveStaff->surname = $array['surname'];
            $saveStaff->patronymic = $array['patronymic'];
        }
        return $this->render('add-staff' ,[
            'model'=> $model
        ]);
    }

}
