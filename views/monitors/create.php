
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Monitors */

$this->title = 'Добавление мониторов';

?>
<div class="monitors-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
