<?php

/* @var $this yii\web\View */
/* @var $model common\models\Folklore */

$this->title = 'Новый тип фольклора';
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>Новый тип фольклора</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>