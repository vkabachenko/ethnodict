<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordEtymology */
/* @var $word common\models\Word */

$this->title = 'Этимология ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Этимология',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новый вариант этимологии словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>