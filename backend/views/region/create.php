<?php

/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = 'Новый район';
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>Новый район</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>