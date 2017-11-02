<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use app\widgets\Menu;
use yii\helpers\Html;
use romankarkachev\coreui\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

romankarkachev\coreui\CoreUIAsset::register($this);

$this->registerCssFile( Yii::$app->getUrlManager()->getBaseUrl() . '/css/site.css', ['depends'=>'romankarkachev\coreui\CoreUIAsset']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?= $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png',
        'href' => Yii::$app->getUrlManager()->getBaseUrl() . '/favicon.png']) ?>
    <?php $this->head() ?>
</head>
<body class="app header-fixed">
<?php $this->beginBody() ?>
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <?= Html::a('<i class="icon-logout"></i>', ['/logout'], ['class' => 'nav-link', 'title' => 'Выйти из системы', 'data-method' => 'post']) ?>

        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <?= Menu::widget() ?>

        </nav>
    </div>
    <main class="main">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'linksAtRight' => isset($this->params['breadcrumbsRight']) ? $this->params['breadcrumbsRight'] : [],]) ?>

        <div class="container-fluid">
            <?= Alert::widget() ?>

            <div class="card mt-4">
                <div class="card-header">
                    <?= $this->title ?>
                </div>
                <div class="card-body">
                    <?= $content ?>
                </div>
            </div>

        </div>
    </main>
</div>
<footer class="app-footer">
    &copy; <?= date('Y') ?> <?= Html::a(Yii::$app->name, ['/']) ?>

    <span class="float-right">Developed by <a href="http://awsaf.me">Awsaf</a> </span>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
