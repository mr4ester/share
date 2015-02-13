<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuration-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'invent_num_system')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'invent_num_monitor')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'invent_num_printer')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'cpu')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'motherboard')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'graphics')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'monitor_1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'monitor_2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hdd_1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hdd_2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'memory_1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'memory_2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'memory_3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'memory_4')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mac')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_1')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_2')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_3')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_4')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_5')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_6')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_7')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_8')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_9')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'print_10')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
