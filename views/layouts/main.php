<?php
use alexgx\phpexcel;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\GetStaff;

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $staff string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap ">
    <?php
    /*Зададим виджету меню другой css класс*/
    \Yii::$container->set('yii\bootstrap\NavBar',[
        'innerContainerOptions'=>[
            'class'=>'container-fluid',
        ],
    ]);

    NavBar::begin([
        'brandLabel' => 'Главная',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top ',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Добавить', 'items' => [
                ['label' => 'Подразделение', 'url' => ['/add/department']],
                ['label' => 'Сотрудника', 'url' => ['/add/staff']],
                ['label' => 'Конфигурацию', 'url' => ['/upload/upload']],
                ['label' => 'Принтер', 'url' => ['/crud-job/index']],
                ['label' => 'Монитор', 'url' => ['/crud-job/index']],
                ['label' => 'Системный блок', 'url' => ['/crud-job/index']],
                ['label' => 'Другое оборудование', 'url' => ['/crud-job/index']],
            ]],
            ['label' => 'Вид', 'items' => [
                ['label' => 'Сотрудники', 'url' => ['/staff/index']],
                ['label' => 'Все конфигурации', 'url' => ['/configuration/index']],
            ]],
            ['label' => 'Инструменты', 'items' => [
                ['label' => 'Планирование', 'url' => ['/crud-job-result/index']],
                ['label' => 'Просмотр пермещений ПК', 'url' => ['/crud-job-result/index']],
            ]],
            ['label' => 'Печать', 'items' => [
                ['label' => 'Реестр сдачи', 'url' => ['/crud-job-result/index']],
                ['label' => 'Акт на списание', 'url' => ['/crud-job-result/index']],
                ['label' => 'Расходная наклодная', 'url' => ['/crud-job-result/index']],
                ['label' => 'Отчет обеспеченности ПК', 'url' => ['/crud-job-result/index']],
                ['label' => 'Отчет по сотруднику', 'url' => ['/crud-job-result/index']],
                ['label' => 'Карточка сотрудника', 'url' => ['/crud-job-result/index']],
                ['label' => 'QRcode сотрудника', 'url' => ['/crud-job-result/index']],
            ]],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2 ">
                <div class="left-staff">
                    <br><br>
                    <h3 class="text-center">Сотрудники</h3>

                <?=GetStaff::widget()?>



                </div>
            </div>
            <dv class="col-md-10 ">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <br><br><br>
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
