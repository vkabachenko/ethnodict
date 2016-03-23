<?php

namespace tests\codeception\backend\_pages\variant;

use yii\codeception\BasePage;

class UpdateVariantPage extends BasePage
{
    public $route = 'variant/update';

    public function submit(array $data)
    {
        foreach ($data as $field => $value) {
            $tableName = $field == 'title' ? 'Word' : 'WordVariant';
            $this->actor->fillField('input[name="'.$tableName.'[' . $field . ']"]', $value);
        }
        $this->actor->click('Сохранить');
    }
}