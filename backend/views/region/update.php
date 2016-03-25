<?php

/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = 'Редактирование ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>Редактирование района</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>