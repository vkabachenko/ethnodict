<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

class WordAccentFixture  extends ActiveFixture {

    public $modelClass = 'common\models\WordAccent';
    public $depends = ['tests\codeception\common\fixtures\WordFixture'];
    public $dataFile = '@tests/codeception/common/unit/fixtures/data/models/wordAccent.php';
}