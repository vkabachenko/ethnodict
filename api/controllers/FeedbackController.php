<?php

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Feedback;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function actions()
    {
        $actions = parent::actions();

        return ['create' => $actions['create']];
    }

}