<?php
use yii\helpers\Html;
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
        <?= $form->field($model, 'list')->listBox(
            $listData,
            array('prompt' => '', 'size' => 1)
        )->label('Подразделения'); ?>
        <?= $form->field($model, 'surname')->textInput(['maxlength' => 64])->label('Фамилия сотрудника') ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => 64])->label('Имя сотрудника') ?>
        <?= $form->field($model, 'patronymic')->textInput(['maxlength' => 64])->label('Отчество сотрудника') ?>





        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary ']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
