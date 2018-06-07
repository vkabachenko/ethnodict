<?php

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Feedback;
use common\helpers\CorsCustom;
use yii\helpers\ArrayHelper;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'corsFilter' => [
                'class' => CorsCustom::class,
            ],
        ]);
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['delete']);
        return $actions;
    }

}