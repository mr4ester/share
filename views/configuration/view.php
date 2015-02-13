<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */

$this->title = $model->id_configuration;
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-view">

    <h2><?= Html::encode($staff) ?></h2>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_configuration], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_configuration], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_configuration',
            'invent_num_system',
            'invent_num_monitor',
            'invent_num_printer',
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
        ],
    ]) ?>

</div>
