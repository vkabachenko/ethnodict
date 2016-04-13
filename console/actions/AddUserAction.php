<?php

namespace console\actions;


use yii\base\Action;
use console\components\UserManager;

class AddUserAction extends Action
{
    public $pathAlias = '@app';

    public function run()
    {
        $userName = $this->controller->prompt('Имя пользователя',['required' => true,]);
        $password = $this->controller->prompt('Пароль',['required' => true,]);
        $password_hash = \Yii::$app->security->generatePasswordHash($password);
        $auth_key = \Yii::$app->security->generateRandomString();
        $userData = [
            $userName => [
                'password' => $password_hash,
                'authkey' => $auth_key ]
        ];
        $manager = new UserManager(['path' => $this->pathAlias]);
        $manager->addUser($userData);
    }

} 