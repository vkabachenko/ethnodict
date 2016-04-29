<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $parentModel \common\models\Word */

$this->title = 'Файлы ' . ' ' . $parentModel->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Файлы',
    'url' => ['index', 'id' => $parentModel->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование файла словарного слова
    <strong>
        <?= Yii::$app->accent->lows($parentModel) ?>
    </strong>
</h1>
<h2>
    Загруженный файл <?= Html::a($model->upload_file,['download','id'=>$model->id]); ?>
</h2>

<?= $this->render('_form', [
    'model' => $model,
]) ?>