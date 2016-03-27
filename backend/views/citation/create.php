<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordCitation */
/* @var $word common\models\Word */

$this->title = 'Цитата ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая цитата словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>