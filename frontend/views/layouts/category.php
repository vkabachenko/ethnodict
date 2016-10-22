<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use common\models\Category;

$currentIdCategory = \Yii::$app->session->has('currentIdCategory') ? \Yii::$app->session->get('currentIdCategory') : null;

echo Html::beginForm(['site/category']);

echo Html::label('Категория','idCategory',['class' => 'hidden-xs hidden-sm']);
echo Html::dropDownList('idCategory',$currentIdCategory,
    Category::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column(),
    ['prompt' => 'Все категории','onChange' => 'this.form.submit();']);

echo Html::endForm();

