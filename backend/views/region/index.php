<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Районы';

?>

<h1>Список районов</h1>

<p>
    <?= Html::a('Новый район', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}',
            'header' => 'Действия'
        ],
    ],
]); ?>
