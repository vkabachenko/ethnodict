<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LiterarySourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Источники';

?>

<h1>Список литературных источников</h1>

<p>
    <?= Html::a('Новый источник', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'short_link',
        'long_link',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>
