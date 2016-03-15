<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

class WordFixture  extends ActiveFixture {

    public $modelClass = 'common\models\Word';
    public $dataFile = '@tests/codeception/common/unit/fixtures/data/models/word.php';
}