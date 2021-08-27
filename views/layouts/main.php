<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body background="<?=Yii::getAlias('@img')?>background-3246124.jpg">
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container mainContainer">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<br>
<footer class="footer">
    <div class="container footerContent">
        <div class="hide-on-med-and-down">
        <p style="float: left;padding-left: 15px;">&copy; Ru Rock by pes7 <?= date('Y') ?></p>
        <p style="float: right;padding-right: 15px;"><?= Yii::powered() ?></p><div style="clear: both;"></div>
        </div>
        <div class="show-on-small hide-on-large-only">
        <p align="center" style="padding: 5px;">&copy; Ru Rock by pes7 <?= date('Y') ?><br>
        <?= Yii::powered() ?></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
