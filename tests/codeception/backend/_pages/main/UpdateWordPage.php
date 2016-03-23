<?php

namespace tests\codeception\backend\_pages\main;

use yii\codeception\BasePage;


class UpdateWordPage extends BasePage
{
    public $route = 'site/update';

    public function submit(array $data)
    {
        foreach ($data as $field => $value) {

            $this->actor->fillField('input[name="Word[' . $field . ']"]', $value);
        }
        $this->actor->click('Сохранить');
    }
}