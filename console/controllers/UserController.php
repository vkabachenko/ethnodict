<?php

namespace console\controllers;


use yii\console\Controller;

class UserController extends Controller
{

    public function actions()
    {
        return [
            'add' => [
                'class' => 'console\actions\AddUserAction',
                'pathAlias' => '@backend'
            ],
        ];
    }
}