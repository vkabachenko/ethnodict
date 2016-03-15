<?php

namespace tests\codeception\common\unit\helpers;

use common\models\Word;
use tests\codeception\common\unit\TestCase;
use tests\codeception\common\fixtures\WordFixture;
use common\helpers\WordHelper;

class WordHelperTest  extends TestCase
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
            WordFixture::className(),
        ];
    }
} 