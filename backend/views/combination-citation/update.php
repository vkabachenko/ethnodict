<?php

/* @var $this yii\web\View */
/* @var $model common\models\CombinationCitation */
/* @var $wordCombination common\models\WordCombination */

$this->title = 'Цитата - редактирование';
$this->params['breadcrumbs'][] = [
    'label' => 'Словосочетание',
    'url' => ['combination/index', 'id' => $wordCombination->word->id]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $wordCombination->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование словосочетания цитаты словарного слова
    <strong>
        <?= Yii::$app->accent->lows($wordCombination->word) ?>
    </strong>
</h1>
    <h2><em>Словосочетание </em><?= $wordCombination->combination ?></h2>

<?= $this->render('_form', [
    'model' => $model,
]) ?>