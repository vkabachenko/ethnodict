<?php

/* @var $this yii\web\View */
/* @var $model common\models\CombinationCitation */
/* @var $parent common\models\WordCombination */

$this->title = 'Цитата - создание ';
$this->params['breadcrumbs'][] = [
    'label' => 'Словосочетание',
    'url' => ['combination/index', 'id' => $parent->word->id]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $parent->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая цитата словосочетания словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parent->word) ?>
    </strong>
</h1>
<h2><em>Словосочетание </em><?= $parent->combination ?></h2>


<?= $this->render('_form', [
    'model' => $model,
]) ?>