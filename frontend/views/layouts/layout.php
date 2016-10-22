<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="hidden-xs">
        <h1><a href="/">ТРАДИЦИОННЫЙ БЫТ ПСКОВСКИХ КРЕСТЬЯН</a></h1>
        <p>Опыт регионального этнолингвистического словаря </p>
    </header>
     <?= $content ?>
</div>

<footer class="footer visible-md visible-lg">
    <div class="container">
        <p class="pull-left">&copy; Лаборатория региональных филологических исследований ПсковГУ, <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
