<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новое сообщение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'text',
                'value' => function($model) {
                    return Html::encode($model->name);
                }
            ],
            [
                'attribute' => 'email',
                'format' => 'email',
                'value' => function($model) {
                    return Html::encode($model->email);
                }
            ],
            [
                'attribute' => 'message',
                'format' => 'ntext',
                'value' => function($model) {
                    return Html::encode($model->message);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'text',
                'value' => function($model) {
                    return \Yii::$app->formatter->asDate($model->created_at);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
