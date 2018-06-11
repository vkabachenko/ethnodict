<?php

namespace api\controllers;

use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\rest\ActiveController;
use common\models\Feedback;
use yii\web\ServerErrorHttpException;
use yii\httpclient\Client;

class FeedbackController extends ActiveController
{
    const SITE_VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

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

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl(self::SITE_VERIFY_URL)
            ->setData([
                'secret' => \Yii::$app->params['recaptchaSecretKey'],
                'response' => $data['recaptchaToken']])
            ->send();

        if (!$response->isOk) {
            throw new \Exception('Connection to the captcha server failed');
        }

        if (!filter_var($response->data['success'], FILTER_VALIDATE_BOOLEAN)) {
            throw new \Exception('Recaptcha check failed');
        }

        $model->load($data, '');
        if ($model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
        } else {
            throw new ServerErrorHttpException('Failed to save the message');
        }

        return $model;

    }

}