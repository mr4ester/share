<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Printers */

?>
<div class="printers-view">

    <div class="panel panel-info">
        <div class="panel-heading">
            <b> <i class="fa fa-bell fa-fw">Принтеры</i></b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id_printer',
                        'invent_num_printer_1',
                        'invent_num_printer_2',
                        'invent_num_printer_3',
                        'invent_num_printer_4',
                        'invent_num_printer_5',
                        'print_1',
                        'print_2',
                        'print_3',
                        'print_4',
                        'print_5',
                        'date_1',
                        'date_2',
                        'date_3',
                        'date_4',
                        'date_5',
                        'old_staff_1',
                        'old_staff_2',
                        'old_staff_3',
                        'old_staff_4',
                        'old_staff_5',
                    ],
                ]) ?>

            </div>
            <!-- /.list-group -->
            <p>
                <?= Html::a('Изменить', ['update_printers', 'id' => $model->id_printer], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete_printers', 'id' => $model->id_printer], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->




</div>
