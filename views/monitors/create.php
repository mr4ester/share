
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Monitors */

$this->title = 'Добавление мониторов';
$this->params['breadcrumbs'][] = ['label' => 'Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitors-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'listData'=> $listData,
    ]) ?>


</div>
