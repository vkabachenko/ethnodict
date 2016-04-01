<?php

/* @var $this yii\web\View */
/* @var $model common\models\LiterarySource */

$this->title = 'Новый источник';
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>Новый литературный источник</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>