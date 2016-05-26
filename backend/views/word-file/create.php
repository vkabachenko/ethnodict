<?php

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $parentModel common\models\Word */

$this->title = 'Файлы ' . ' ' . $parentModel->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Файлы',
    'url' => ['index', 'id' => $parentModel->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новый файл словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parentModel) ?>
    </strong>
</h1>

<?= $this->render('//file/_form', [
    'model' => $model,
]) ?>