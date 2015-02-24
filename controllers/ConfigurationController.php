<?php

namespace app\controllers;

use Yii;
use app\models\Configuration;
use app\models\ConfigurationSearch;
use app\models\Staff;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use app\models\ValidateForm;


/**
 * ConfigurationController implements the CRUD actions for Configuration model.
 */
class ConfigurationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'move' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Configuration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConfigurationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Configuration model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $staff=null)
    {
        $staff = Staff::find()->where(['id_configuration' => $id])->asArray()->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'staff' => $staff['fio'],
        ]);
    }


    /**
     * Creates a new Configuration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Configuration();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_configuration]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Configuration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_configuration]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Configuration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $staff = Staff::find()->where(['id_configuration' => $id])->one();//сначала ищем в таблице сотрудников
        $staff->id_configuration = '';//id конфигурации и удаляем, если этого не сделать, вылазит ошибка
        $staff->update();//о внешнем ключе который зависим от конфигурации и удаления не будет

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Configuration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Configuration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Configuration::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMove($id)
    {

        if ($array = Yii::$app->request->post('ValidateForm')) {
            $staff = Staff::find()->where(['id_configuration' => $id])->one();//ищем владельца текущей конфигурации с которой работаем
            $conf = Configuration::findOne($id);//ищем конфигурацию с которой работаем
            $conf->old_staff = $staff['id_staff'];//записываем в эту конфигурацию id текущего владельца
            $staff->id_configuration = ''; //Обнуляем у текущего владельца конфигурацию
            $staff->save();
            $staff = Staff::findOne($array['staff']);//ищем нового владельца конфигурацией
            $staff->id_configuration = $id;//и присваеваем ему новую конфигурацию
            $conf->save();
            $staff->save();
            return $this->redirect(['configuration/view', 'id' => $id]);


        }

        $model = new ValidateForm();
        $staff = Staff::find()->all();

        $listData = ArrayHelper::map($staff, 'id_staff', 'fio');// выбирает из масиива ключ-значение

        return $this->render('move', [
            'listData' => $listData,
            'model' => $model,
            'id' => $id,
        ]);

    }
}
