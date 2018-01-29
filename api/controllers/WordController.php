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
          return [];
    }

    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Word::find()->inList(),
            'pagination' => false,
        ]);
    }

    public function actionView($id)
    {
       $model = Word::find()
            ->where(['id' => $id])
            ->with('wordAccents')
            ->with(['wordVariants' => function(\yii\db\ActiveQuery $query) {
                $query->orderBy('id_type');
            }])
            ->with('wordCitations')
            ->with('wordCombinations')
            ->with('wordApiFolklors')
            ->one();

        return $model;
    }


}