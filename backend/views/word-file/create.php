<?php

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $word common\models\Word */

$this->title = 'Файлы ' . ' ' . $word->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Файлы',
    'url' => ['index', 'id' => $word->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новый файл словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>