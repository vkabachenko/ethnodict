<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordCitation */
/* @var $parent common\models\Word */

$this->title = 'Цитата ' . ' ' . $parent->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Цитаты',
    'url' => ['index', 'id' => $parent->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новая цитата словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parent) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>