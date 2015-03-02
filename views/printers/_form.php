<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $model app\models\Printers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="printers-form">

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

    <?= $form->field($model, 'invent_num_printer_1')->textInput() ?>

    <?= $form->field($model, 'invent_num_printer_2')->textInput() ?>

    <?=Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => 'В приведенной ниже форме необходимо отчистить поля всех ненужных принтеров ',
    ]); ?>

    <?= $form->field($model, 'print_1')->textInput() ?>

    <?= $form->field($model, 'print_2')->textInput() ?>

    <?= $form->field($model, 'print_3')->textInput() ?>

    <?= $form->field($model, 'print_4')->textInput() ?>

    <?= $form->field($model, 'print_5')->textInput() ?>

    <?= $form->field($model, 'print_6')->textInput() ?>

    <?= $form->field($model, 'print_7')->textInput() ?>

    <?= $form->field($model, 'print_8')->textInput() ?>

    <?= $form->field($model, 'print_9')->textInput() ?>

    <?= $form->field($model, 'print_10')->textInput() ?>

    <?= $form->field($model,'date_1')->widget(DatePicker::className(),['language'=>'ru','dateFormat' => 'dd-MM-yyyy',]) ?>

    <?= $form->field($model,'date_2')->widget(DatePicker::className(),['language'=>'ru','dateFormat' => 'dd-MM-yyyy',]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
