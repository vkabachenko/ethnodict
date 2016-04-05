<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Utf8;
use common\models\LiterarySource;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordEtymologySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'Этимология';
$this->params['breadcrumbs'][] = 'Этимология';
?>

<h1>
    Этимология словарного слова
    <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новый вариант', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'description',
            'value' => function($model) {
                    return Utf8::mb_trunc($model->description,60);
                },
            ],
            [
            'attribute' => 'id_source',
            'value' => function($model) {
                    return $model->literarySource->short_link;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_source',
                    LiterarySource::find()->select(['short_link','id'])->orderBy('short_link')->indexBy('id')->column(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
            ],
            'source_addition',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>
