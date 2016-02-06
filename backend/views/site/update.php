<?php

/* @var $this yii\web\View */
/* @var $model common\models\Word */

$this->title = 'Редактирование ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>Редактирование словарного слова</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>