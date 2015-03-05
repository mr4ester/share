<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */

//$this->title = Html::encode($staff);
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-view">



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
            'cpu:html',
            'motherboard:html',
            'graphics:html',
            'hdd_1:html',
            'hdd_2:html',
            'memory_1:html',
            'memory_2:html',
            'memory_3:html',
            'memory_4:html',
            'mac:html',
        ],
    ]) ?>

</div>
