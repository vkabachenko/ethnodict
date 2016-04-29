<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Администрирование';

?>

<h1>Список словарных слов и выражений</h1>

<p>
    <?= Html::a('Новое слово', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'title',
            'format' => 'raw',
            'value' => function($model) {
                    return Yii::$app->accent->full($model);
                }
        ],
        [
            'attribute' => 'description',
            'value' => function($model) {
                    return Utf8::mb_trunc($model->description,40);
                }
        ],
        [
            'format' => 'raw',
            'attribute' => 'variants_count',
            'label' => 'Варианты',
            'value' => function($model) {
                    return Html::a($model->variants_count,
                        ['variant/index', 'id' => $model->id]);
                }
        ],
        [
            'format' => 'raw',
            'attribute' => 'citations_count',
            'label' => 'Цитаты',
            'value' => function($model) {
                    return Html::a($model->citations_count,
                        ['citation/index', 'id' => $model->id]);
                }
        ],
        [
            'format' => 'raw',
            'attribute' => 'combinations_count',
            'label' => 'Сочетания',
            'value' => function($model) {
                    return Html::a($model->combinations_count,
                        ['combination/index', 'id' => $model->id]);
                }
        ],
        [
            'format' => 'raw',
            'attribute' => 'folklors_count',
            'label' => 'Фольклор',
            'value' => function($model) {
                    return Html::a($model->folklors_count,
                        ['word-folklore/index', 'id' => $model->id]);
                }
        ],
        [
            'format' => 'raw',
            'attribute' => 'etymologies_count',
            'label' => 'Этимология',
            'value' => function($model) {
                    return Html::a($model->etymologies_count,
                        ['etymology/index', 'id' => $model->id]);
                }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}{file}',
            'buttons' => [
                'file' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-upload"></span>',
                            ['upload', 'id' => $model->id],
                            [
                                'data-toggle' => 'tooltip',
                                'title' => 'Файлы',
                            ]);
                    },
            ],
            'header' => 'Действия'
        ],
    ],
]); ?>
