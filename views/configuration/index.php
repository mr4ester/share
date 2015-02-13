<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configurations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить конфигурацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_configuration',
           // 'invent_num_system',
//            'invent_num_monitor',
//            'invent_num_printer',
             'cpu',
             'motherboard',
             'graphics',
             'monitor_1',
              'monitor_2',
             'hdd_1',
              'hdd_2',
             'memory_1',
             'memory_2',
             'memory_3',
             'memory_4',
             'mac',
             'print_1',
             'print_2',
             'print_3',
             'print_4',
             'print_5',
             'print_6',
             'print_7',
             'print_8',
             'print_9',
             'print_10',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
