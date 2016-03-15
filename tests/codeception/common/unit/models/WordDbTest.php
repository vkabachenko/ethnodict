<?php

namespace tests\codeception\common\unit\models;

use common\models\Word;
use tests\codeception\common\unit\TestCase;
use tests\codeception\common\fixtures\WordAccentFixture;
use tests\codeception\common\fixtures\WordFixture;

class WordDbTest extends TestCase
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
            WordFixture::className(),
            WordAccentFixture::className()
            ];
    }
} 