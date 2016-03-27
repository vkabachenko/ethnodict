<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;
use common\helpers\RegionHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordCitationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'Цитаты';
$this->params['breadcrumbs'][] = 'Цитаты';
?>

<h1>
    Текстовые цитаты словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новая цитата', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'fragment',
            'value' => function($model, $key, $index, $column) {
                    return Utf8::mb_trunc($model->fragment,60);
                },
            ],
            [
            'attribute' => 'id_region',
            'value' => function($model, $key, $index, $column) {
                    return $model->region->name;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_region',
                    RegionHelper::namesArray(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>
