<?php

namespace tests\codeception\common\unit\helpers;

use common\models\Word;
use tests\codeception\common\unit\DbTestCase;
use tests\codeception\common\fixtures\WordFixture;
use common\helpers\WordHelper;

class WordHelperTest  extends DbTestCase
{

    public function testChanged()
    {
        /* @var $model Word */
        $model = new Word;
        expect('new model means changed',WordHelper::changed($model))->true();

        $model = Word::findOne(1);
        expect('existing model means unchanged',WordHelper::changed($model))->false();

        $model->title .= '*';
        expect('changed title means changed',WordHelper::changed($model))->true();
    }


    /**
     * @inheritdoc
     */
    public function fixtures()
    {
        return [
            [
                'class' => WordFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/word.php'
            ],
        ];
    }
} 