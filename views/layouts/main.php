<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>


    <?php $this->head() ?>


    <meta name="robots" content="index, follow"/>
    <link rel="shortcut icon" href="/img/favicon.gif" type="image/x-icon">
    <link rel="icon" href="/img/favicon.gif" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="yandex-verification" content="04a2f4fc8337ae8d"/>



</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
        <!--Шапка-->
        <nav class="navbar navbar-default"">
            <div class="raw">
                <div class="col-md-5 col-sm-12">
                <ul class="nav navbar-nav">
                    <li><?= Html::a('Главная', ['/'], ['class' => 'profile-link']) ?></li>
                    <li><?= Html::a('Доставка и самовывоз', ['#delivery'], ['class' => 'profile-link']) ?></li>
                    <li><?= Html::a('Контакты', ['site/contact']) ?></li>
                </ul>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="col-md-6 col-sm-12 phone centering">
                        <a href="tel:+74952011235" class="pull-right">+7(495)201-12-35</a>
                    </div>
                    <div class="col-md-6 col-sm-12 phone">
                        <a href="tel:+79067778292" class="pull-right">+7(906)777-82-92</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="raw">
                        <div class="col-md-12 whatsapp">
                            <?= Html::img('@web/img/whatsapp-logo-min.png', ['alt' => 'whatsapp']) ?>
                        </div>

                        <div class="col-md-12 pull-right"><p class="head-text pull-right">с 9 до 24</p></div>
                    </div>
                </div>
            </div>
        </nav>

    <div сlass="raw">
        <div class="col-md-4 col-md-offset-4 head-mess">
            <p>Без праздников и выходных</p>
        </div>
    </div>

    <?= $content ?>

        <div class="col-md-12 footer-block"><p>© 2016, все права защищены. ООО "Игрушки для детишек".<br/>
            ОГРН: 3483935284366 г. Москва, Строгинский бульвар д.1 офис 48</p></div>

</div>
<?php $this->endBody() ?>

</body>
</html><!--Cached:2017-11-17 14:31:21-CDN--><!--Time:0.34335589408875-->
<?php $this->endPage() ?>