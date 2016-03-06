<?php

namespace tests\codeception\common\unit\models;

use common\models\Word;
use tests\codeception\common\unit\DbTestCase;
use tests\codeception\common\fixtures\WordAccentFixture;
use tests\codeception\common\fixtures\WordFixture;

class WordDbTest extends DbTestCase
{

    public function testWordAccent()
    {
        /* @var $model Word */
        $model = Word::findOne(2);
        $accents = $model->wordAccents;
        expect('found accents count',count($accents))->equals(2);
        expect('found first accent position',$accents[0]->accent_position)->equals(0);
        expect('found second accent position',$accents[1]->accent_position)->equals(5);
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
            [
                'class' => WordAccentFixture::className(),
                'dataFile' => '@tests/codeception/common/unit/fixtures/data/models/wordAccent.php'
            ],
        ];
    }
} 