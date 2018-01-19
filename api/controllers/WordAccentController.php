<?php
namespace api\controllers;

use common\models\WordAccent;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class WordAccentController extends ActiveController
{
    public $modelClass = WordAccent::class;

    public function actions()
    {
        return [];
    }

    public function actionView($id)
    {
        return new ActiveDataProvider([
            'query' => WordAccent::find()->where(['id_word' => $id])->orderBy('accent_position DESC'),
            'pagination' => false,
        ]);
    }
}