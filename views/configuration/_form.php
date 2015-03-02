
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuration-form">

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

    <?= $form->field($model, 'invent_num_system')->textInput() ?>

    <?= $form->field($model, 'cpu')->textInput() ?>

    <?= $form->field($model, 'motherboard')->textInput() ?>

    <?= $form->field($model, 'graphics')->textInput() ?>

    <?= $form->field($model, 'hdd_1')->textInput() ?>

    <?= $form->field($model, 'hdd_2')->textInput() ?>

    <?= $form->field($model, 'memory_1')->textInput() ?>

    <?= $form->field($model, 'memory_2')->textInput() ?>

    <?= $form->field($model, 'memory_3')->textInput() ?>

    <?= $form->field($model, 'memory_4')->textInput() ?>

    <?= $form->field($model, 'mac')->textInput() ?>

    <?= $form->field($model,'date')->widget(DatePicker::className(),['language'=>'ru','dateFormat' => 'dd-MM-yyyy',]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>