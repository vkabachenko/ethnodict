<?php

namespace tests\codeception\backend\_pages\variant;

use yii\codeception\BasePage;

class CreateVariantPage extends BasePage
{
    public $route = 'variant/create';

    public function submit(array $data)
    {
        foreach ($data as $field => $value) {

            if ($field == 'id_type') {
                $this->actor->selectOption('select',$value);
            } else {
                $tableName = $field == 'title' ? 'Word' : 'WordVariant';
                $this->actor->fillField('input[name="'.$tableName.'[' . $field . ']"]', $value);
            }
        }
        $this->actor->click('Создать');
    }
}