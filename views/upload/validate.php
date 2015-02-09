<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;

?>
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-10">
        <?php $form = ActiveForm::begin([
            'id' => 'config-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => ''

                ],
            ],
        ]); ?>
        <?= $form->field($model, 'staff')->listBox(
            array('1' => '1', 2 => '2', 3 => 3, 4 => 4, 5 => 5),
            array('prompt' => '', 'size' => 1)
        )->label('Список сотрудников'); ?>
        <?= $form->field($model, 'cpu')->textInput(['maxlength' => 64, 'value' => Html::encode($config['тип цп'])])->label('CPU') ?>
        <?= $form->field($model, 'motherboard')->textInput(['maxlength' => 64, 'value' => Html::encode($config['системная плата'])])->label('Motherboard') ?>
        <?= $form->field($model, 'gpu')->textInput(['maxlength' => 64, 'value' => Html::encode($config['видеоадаптер1'])])->label('GPU') ?>
        <?= $form->field($model, 'monitor')->textInput(['maxlength' => 64, 'value' => Html::encode($config['монитор1'])])->label('Monitor 1') ?>
        <?= $form->field($model, 'monitor2')->textInput(['maxlength' => 64, 'value' => Html::encode($config['монитор2'])])->label('Monitor 2') ?>
        <?= $form->field($model, 'hdd1')->textInput(['maxlength' => 64, 'value' => Html::encode($config['дисковый накопитель1'])])->label('HDD 1') ?>
        <?= $form->field($model, 'hdd2')->textInput(['maxlength' => 64, 'value' => Html::encode($config['дисковый накопитель2'])])->label('HDD 2') ?>
        <?= $form->field($model, 'mac')->textInput(['maxlength' => 64, 'value' => Html::encode($config['первичный адрес mac'])])->label('MAC address') ?>
        <?= $form->field($model, 'printer1')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер1'])])->label('Printer 1') ?>
        <?= $form->field($model, 'printer2')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер2'])])->label('Printer 2 ') ?>
        <?= $form->field($model, 'printer3')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер3'])])->label('Printer 3') ?>
        <?= $form->field($model, 'printer4')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер4'])])->label('Printer 4') ?>
        <?= $form->field($model, 'printer5')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер5'])])->label('Printer 5 ') ?>
        <?= $form->field($model, 'printer6')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер6'])])->label('Printer 6') ?>
        <?= $form->field($model, 'printer7')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер7'])])->label('Printer 7') ?>
        <?= $form->field($model, 'printer8')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер8'])])->label('Printer 8') ?>
        <?= $form->field($model, 'printer9')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер9'])])->label('Printer 9') ?>
        <?= $form->field($model, 'printer10')->textInput(['maxlength' => 64, 'value' => Html::encode($config['принтер10'])])->label('Printer 10') ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary ']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
