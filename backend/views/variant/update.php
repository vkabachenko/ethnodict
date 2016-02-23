<?php

/* @var $this yii\web\View */
/* @var $model common\models\WordVariant */
/* @var $word common\models\Word */
/* @var $variant common\models\Word */

$this->title = 'Вариант ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Варианты',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование варианта словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
    'variant' => $variant,
]) ?>