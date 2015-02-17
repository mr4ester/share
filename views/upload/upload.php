<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data',
'class'=>'form-inline ']]) ?>

<?= $form->field($model, 'file')->fileInput()->label('Загрузите файл конфигурации') ?>

<button class= 'btn btn-primary'>Отправить</button>
    <?php ActiveForm::end() ?>

