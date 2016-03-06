<?php

namespace tests\codeception\common\fixtures;

use yii\test\ActiveFixture;

class WordVariantFixture  extends ActiveFixture {

    public $modelClass = 'common\models\WordVariant';
    public $depends = ['tests\codeception\common\fixtures\WordFixture'];

} 