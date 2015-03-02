<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Printers */

$this->title = 'Update Printers: ' . ' ' . $model->id_printer;
$this->params['breadcrumbs'][] = ['label' => 'Printers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_printer, 'url' => ['view', 'id' => $model->id_printer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="printers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
