<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Folklore;
use common\models\Region;
use common\helpers\Utf8;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordFolkloreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'В фольклоре';
$this->params['breadcrumbs'][] = 'В фольклоре';
?>

<h1>
    Словарное слово <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong> в фольклоре
</h1>

<p>
    <?= Html::a('Новый пример', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'id_folklore',
            'value' => function($model) {
                    return $model->folklore ? $model->folklore->name : null;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_region',
                    Folklore::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
            ],
            [
            'attribute' => 'fragment',
            'value' => function($model) {
                    return Utf8::mb_trunc($model->fragment,60);
                },
            ],
            [
            'attribute' => 'id_region',
            'value' => function($model) {
                    return $model->region ? $model->region->name : null;
                },
            'filter' => Html::activeDropDownList($searchModel, 'id_region',
                    Region::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column(),
                    ['prompt' => 'Поиск','class' => 'form-control']),
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
