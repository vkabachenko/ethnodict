<?php

namespace api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use common\models\Category;


class CategoryController extends ActiveController
{
    public $modelClass = Category::class;

    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Category::find()->orderBy('name'),
            'pagination' => false,
        ]);
    }
}