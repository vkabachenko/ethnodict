<?php
namespace api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use common\models\Word;

class WordController extends ActiveController
{
    public $modelClass = Word::class;

    public function actions()
    {
        return array_intersect_key(parent::actions(), array_flip(['view']));
    }

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Word::find()->orderBy('title'),
            'pagination' => false,
        ]);
    }
}