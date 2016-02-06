<?php

/* @var $this yii\web\View */
/* @var $model common\models\Word */

$this->title = 'Новое слово';
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>Новое словарное слово</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>