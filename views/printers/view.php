<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Printers */

$this->title = $model->id_printer;
$this->params['breadcrumbs'][] = ['label' => 'Printers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="printers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_printer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_printer], [
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
            'id_printer',
            'invent_num_printer_1',
            'invent_num_printer_2',
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
            'date_1',
            'date_2',
            'old_staff_1',
            'old_staff_2',
        ],
    ]) ?>

</div>
