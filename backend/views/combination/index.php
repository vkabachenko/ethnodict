<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordCombinationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'Словосочетания';
$this->params['breadcrumbs'][] = 'Словосочетания';
?>

<h1>
    Устойчивые словосочетания словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новое словосочетание', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'combination',
            'value' => function($model) {
                    return Utf8::mb_trunc($model->combination,60);
                },
            ],
            [
                'attribute' => 'explanation',
                'value' => function($model) {
                        return Utf8::mb_trunc($model->explanation,60);
                },
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}{citation}',
            'buttons' => [
                'citation' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon
                        glyphicon-copyright-mark"></span>',
                            ['combination-citation/index', 'id' => $model->id],
                            [
                                'data-toggle' => 'tooltip',
                                'title' => 'Цитаты',
                            ]);
                    },
            ],
            'header' => 'Действия'
        ],
    ],
]); ?>
