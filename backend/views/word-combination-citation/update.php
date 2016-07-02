<?php

/* @var $this yii\web\View */
/* @var $model common\models\CombinationCitation */
/* @var $parent common\models\WordCombination */

$this->title = 'Цитата - редактирование';
$this->params['breadcrumbs'][] = [
    'label' => 'Словосочетание',
    'url' => ['combination/index', 'id' => $parent->word->id]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $parent->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование словосочетания цитаты словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parent->word) ?>
    </strong>
</h1>
    <h2><em>Словосочетание </em><?= $parent->combination ?></h2>

<?= $this->render('_form', [
    'model' => $model,
]) ?>