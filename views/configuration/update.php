<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuration */

$this->title = 'Изменение конвигурации: ';
$this->params['breadcrumbs'][] = ['label' => 'Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_configuration, 'url' => ['view', 'id' => $model->id_configuration]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
