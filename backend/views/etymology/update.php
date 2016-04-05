<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordCitation */
/* @var $word common\models\Word */

$this->title = 'Этимология ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Этимология',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование варианта этимологии словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>