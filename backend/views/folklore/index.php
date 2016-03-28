<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FolkloreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы фольклора';

?>

<h1>Список типов фольклора</h1>

<p>
    <?= Html::a('Новый тип фольклора', ['create'], ['class' => 'btn btn-success']) ?>
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
