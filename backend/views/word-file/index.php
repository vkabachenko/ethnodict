<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Folklore;
use common\models\Region;
use common\helpers\Utf8;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WordFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $word common\models\Word */

$this->title = 'Файлы';
$this->params['breadcrumbs'][] = 'Файлы';
?>

<h1>
    Файлы словарного слова <strong>
        <?= Yii::$app->accent->lows($word) ?>
    </strong>
</h1>

<p>
    <?= Html::a('Новый файл', ['create','id_word' => $word->id],
        ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
            [
            'attribute' => 'upload_file',
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
