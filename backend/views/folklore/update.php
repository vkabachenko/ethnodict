<?php

/* @var $this yii\web\View */
/* @var $model common\models\Folklore */

$this->title = 'Редактирование ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>Редактирование типа фольклора</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>