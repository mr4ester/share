<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monitors */

?>
<div class="monitors-view">

    <div class="col-lg-8">
    <div class="panel panel-info">

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">
                <table class="table">
                    <tr>
                        <th></th>
                        <th>Название</th>
                        <th>Дата поступления</th>
                        <th>Инв №</th>
                    </tr>

                   <tr>
                       <td>Отделение</td>
                       <td><?= $department->department?></td>
                    </tr>
                    <tr>
                        <td>ФИО</td>
                        <td><?= $staff->fio ?></td>
                    </tr>
                    <tr>
                        <td>Монитор</td>
                        <td><?=$monitors->monitor_1 ?></td>
                        <td><?=$monitors->date_1 ?></td>
                        <td><?=$monitors->invent_num_monitor_1 ?></td>
                    </tr>
                    <tr>
                        <td>Конфигурация</td>
                        <td><?= $brief_conf->title ?></td>
                        <td><?=$configuration->date ?></td>
                        <td><?=$configuration->invent_num_system ?></td>
                    </tr>

                </table>


            </div>
            <!-- /.list-group -->
            <p>
                <?= Html::a('Посмотреть полную конфигурацию', ['view_all_configuration', 'id' => $staff->id_staff], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Печать карточки сотрудника', ['view_all_configuration', 'id' => $staff->id_staff], ['class' => 'btn btn-primary']) ?>
            </p>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
    </div>



    <div class="col-lg-4">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <b> <i class="fa fa-bell fa-fw">QR code конфигурации</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <img src="../web/img/qr-code.gif" alt="" width="200" height="200" align="center" >
                </div>
                <!-- /.list-group -->

                <a href="#" class="btn btn-primary btn-block">Печать QR code</a>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>


</div>