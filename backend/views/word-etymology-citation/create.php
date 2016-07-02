<?php

/* @var $this yii\web\View */
/* @var $model common\models\EtymologyCitation */
/* @var $parent common\models\WordEtymology */

$this->title = 'Цитата - создание ';
$this->params['breadcrumbs'][] = [
    'label' => 'Этимология',
    'url' => ['etymology/index', 'id' => $parent->word->id]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $parent->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая цитата этимологии словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parent->word) ?>
    </strong>
</h1>
<h2><em>Этимология </em><?= $parent->description ?></h2>


<?= $this->render('_form', [
    'model' => $model,
]) ?>