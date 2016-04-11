<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordCombination */
/* @var $word common\models\Word */

$this->title = 'Словосочетание ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Словосочетания',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование словосочетания словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>