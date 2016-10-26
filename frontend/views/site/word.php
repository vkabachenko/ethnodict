<?php

/* @var $this yii\web\View */
/* @var $word \common\models\Word */
use frontend\widgets\VariantWidget;
use yii\helpers\Html;

$this->title = $word->title;

?>
<div id="word">

    <h2> <?= \Yii::$app->accent->full($word); ?> </h2>
    <p class="description"> <?= Html::encode($word->description); ?> </p>

    <?= VariantWidget::widget(['word' => $word]); ?>

</div>
