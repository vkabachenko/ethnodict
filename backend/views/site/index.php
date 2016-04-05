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
                    return Utf8::mb_trunc($model->description,60);
                }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}{variant}{citation}{folklore}{etymology}',
            'buttons' => [
                'variant' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-duplicate"></span>',
                        ['variant/index', 'id' => $model->id],
                        [
                            'data-toggle' => 'tooltip',
                            'title' => 'Варианты',
                        ]);
                    },
                'citation' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-copyright-mark"></span>',
                            ['citation/index', 'id' => $model->id],
                            [
                                'data-toggle' => 'tooltip',
                                'title' => 'Цитаты',
                            ]);
                    },
                'folklore' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-tree-deciduous"></span>',
                            ['word-folklore/index', 'id' => $model->id],
                            [
                                'data-toggle' => 'tooltip',
                                'title' => 'Фольклор',
                            ]);
                    },
                'etymology' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-book"></span>',
                            ['etymology/index', 'id' => $model->id],
                            [
                                'data-toggle' => 'tooltip',
                                'title' => 'Этимология',
                            ]);
                    },
            ],
            'header' => 'Действия'
        ],
    ],
]); ?>
