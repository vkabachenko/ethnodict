<?php

namespace tests\codeception\backend\_pages;

use yii\codeception\BasePage;


class CreateWordPage extends BasePage
{
    public $route = 'site/create';

    public function submit(array $data)
    {
        foreach ($data as $field => $value) {

            $this->actor->fillField('input[name="Word[' . $field . ']"]', $value);
        }
        $this->actor->click('Создать');
    }
}