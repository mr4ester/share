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

            //'id_configuration:html',
           // 'invent_num_system:html',
//            'invent_num_monitor:html',
//            'invent_num_printer:html',
             'cpu:html',
             'motherboard:html',
             'graphics:html',
             'monitor_1:html',
              'monitor_2:html',
             'hdd_1:html',
              'hdd_2:html',
             'memory_1:html',
             'memory_2:html',
             'memory_3:html',
             'memory_4:html',
             'mac:html',
             'print_1:html',
             'print_2:html',
             'print_3:html',
             'print_4:html',
             'print_5:html',
             'print_6:html',
             'print_7:html',
             'print_8:html',
             'print_9:html',
             'print_10:html',
             'date:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
