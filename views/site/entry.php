<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\bootstrap\DatePicker;
?>
<?php $form = ActiveForm::begin();?>
<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
