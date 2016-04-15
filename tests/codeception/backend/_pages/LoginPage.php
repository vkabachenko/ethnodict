<?php

namespace tests\codeception\backend\_pages;

use yii\codeception\BasePage;


class LoginPage extends BasePage
{
    public $route = 'site/login';

    public function submit(array $data)
    {
        foreach ($data as $field => $value) {

            $this->actor->fillField('input[name="LoginForm[' . $field . ']"]', $value);
        }
        $this->actor->click('Вход');
    }

    public function login()
    {
        $this->submit([
            'username' => 'admin',
            'password' => '1',
        ]);
        $this->actor->wait(2);
        $this->actor->see('admin');
    }
}