<?php

namespace api\controllers;

use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\rest\ActiveController;
use common\models\Feedback;
use yii\web\ServerErrorHttpException;

class FeedbackController extends ActiveController
{
    public $modelClass = Feedback::class;

    public function actions()
    {
        return [];
    }

    public function actionCreate()
    {
        /** @var  $model ActiveRecord */
        $model = new $this->modelClass();

        $data = Json::decode(\Yii::$app->getRequest()->getRawBody());
        $model->load($data, '');
        if ($model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return $model;

    }

}