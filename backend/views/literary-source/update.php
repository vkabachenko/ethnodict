<?php

/* @var $this yii\web\View */
/* @var $model common\models\LiterarySource */

$this->title = 'Редактирование ' . ' ' . $model->short_link;
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>Редактирование литературного источника</h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>