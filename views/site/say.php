<?php
use yii\helpers\Html;
?>

<?= $this->render('/configuration/view', [
    'model' => $conf,
]) ?>

<?= $this->render('/monitors/view', [
    'model' => $mon,
]) ?>

