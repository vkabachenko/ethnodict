<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParentFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $parentModel \common\models\WordFolklore */

$this->title = 'Файлы';
$this->params['breadcrumbs'][] = [
    'label' => 'Фольклорные цитаты',
    'url' => ['word-folklore/index', 'id' => $parentModel->id_word]
];
$this->params['breadcrumbs'][] = 'Файлы';
?>

<h1>
    Файлы фольклорной цитаты <strong>
        <?= Utf8::mb_trunc($parentModel->fragment,40) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новый файл', ['create','id_parent' => $parentModel->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'upload_file',
            'label' => 'Файл',
            'format' => 'raw',
            'value' => function($model) {
                    return Html::a($model->upload_file,['download','id'=>$model->id]);
                },
            ],
            'description',
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
            ],
    ],
]); ?>
