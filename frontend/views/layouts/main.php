<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\custom\MainMenu;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
?>

<?php $this->beginContent('@frontend/views/layouts/layout.php'); ?>
    <div class="container">
        <?= Alert::widget() ?>
        <?php
        NavBar::begin([
            'brandLabel' => false,
            'id' => 'main-navbar',
            'options' => ['class' => 'visible-xs navbar-default']
        ]);
        NavBar::end();
        ?>
        <div class="row" id="filter-search">
            <div id="category-filter" class="col-xs-6">
                <?= $this->render('category'); ?>
            </div>
            <div id="word-search" class="col-xs-6">
                <p class="pull-right">search</p>
            </div>
        </div>
        <div class="row">
            <div id= "main-menu-wrap" class="col-sm-2 hidden-xs">
                <?= Nav::widget([
                    'items' => (new MainMenu(['idCategory' => \Yii::$app->session->get('currentIdCategory')]))->menuItems(),
                    'options' => ['class' => 'nav nav-pills nav-stacked',
                    'id' => 'main-menu',
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-10">
                <?= $content ?>
            </div>
        </div>
    </div>
<?php
$script =
    <<<JS
$(window).on('resize',function(){
    var windowWidth = $(this).width();

    // main menu
    var mainmenu = $('#main-menu');
    var parent = mainmenu.parent();
    if(windowWidth < 768 && parent.is('#main-menu-wrap')) {
        mainmenu.appendTo('#main-navbar-collapse');
    };
    if(windowWidth >= 768 && parent.is('#main-navbar-collapse')) {
        mainmenu.appendTo('#main-menu-wrap');
    };

    // header font size
    if (windowWidth > 1150) {
        var h1size = 48;
    } else if (windowWidth >= 768) {
        h1size = 48*windowWidth/1150;
    }
    $('header h1').css('fontSize', h1size);
});
$(window).trigger('resize');
JS;
$this->registerJs($script);
?>
<?php $this->endContent(); ?>


