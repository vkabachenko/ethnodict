<?php

/* @var $this yii\web\View */
/* @var $model common\models\EtymologyCitation */
/* @var $wordEtymology common\models\WordEtymology */

$this->title = 'Цитата - создание ';
$this->params['breadcrumbs'][] = [
    'label' => 'Этимология',
    'url' => ['etymology/index', 'id' => $wordEtymology->word->id]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $wordEtymology->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая цитата этимологии словарного слова
    <strong>
        <?= Yii::$app->accent->lows($wordEtymology->word) ?>
    </strong>
</h1>
<h2><em>Этимология </em><?= $wordEtymology->description ?></h2>


<?= $this->render('_form', [
    'model' => $model,
]) ?>