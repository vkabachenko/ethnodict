<?php

use yii\helpers\Html;
use common\helpers\Utf8;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $parentModel \common\models\WordFolklore */

$this->title = 'Файлы ' . ' ' . Utf8::mb_trunc($parentModel->fragment,40);
$this->params['breadcrumbs'][] = [
    'label' => 'Фольклорные цитаты',
    'url' => ['word-folklore/index', 'id' => $parentModel->id_word]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Файлы',
    'url' => ['index', 'id' => $parentModel->id]
];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<h1>
    Редактирование файла фольклорной цитаты
    <strong>
        <?= Utf8::mb_trunc($parentModel->fragment,40) ?>
    </strong>
</h1>
<h2>
    Загруженный файл <?= Html::a($model->upload_file,['download','id'=>$model->id]); ?>
</h2>

<?= $this->render('//file/_form', [
    'model' => $model,
]) ?>