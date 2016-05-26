<?php

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $parentModel common\models\WordFolklore */

use common\helpers\Utf8;

$this->title = 'Файлы ' . ' ' . Utf8::mb_trunc($parentModel->fragment,40);
$this->params['breadcrumbs'][] = [
    'label' => 'Фольклорные цитаты',
    'url' => ['word-folklore/index', 'id' => $parentModel->id_word]
];
$this->params['breadcrumbs'][] = [
    'label' => 'Файлы',
    'url' => ['index', 'id' => $parentModel->id]
];
$this->params['breadcrumbs'][] = 'Создание';
?>
<h1>
    Новый файл фольклорной цитаты
    <strong>
        <?= Utf8::mb_trunc($parentModel->fragment,40) ?>
    </strong>
</h1>

<?= $this->render('//file/_form', [
    'model' => $model,
]) ?>