<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */

$this->title = Html::encode($staff);
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-view">

    <h2><?= Html::encode($staff) ?></h2>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_configuration], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Переместить', ['move', 'id' => $model->id_configuration], ['class' => 'btn btn-success', 'data'=>['method' => 'post'],]) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_configuration], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную конфигурацию?',
                'method' => 'post',
            ],
        ])
        ?>

    </p>

    <?=  DetailView::widget([
        'model' => $model,
        'attributes' => [
            'date',
            //'id_configuration:html',
            'invent_num_system:html',
            'invent_num_monitor:html',
            'invent_num_printer:html',
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
        ],
    ]) ?>

</div>
