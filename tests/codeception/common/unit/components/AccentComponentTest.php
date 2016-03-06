<?php


namespace tests\codeception\common\unit\components;

use common\models\Word;
use tests\codeception\common\unit\DbTestCase;
use tests\codeception\common\fixtures\WordAccentFixture;
use tests\codeception\common\fixtures\WordFixture;
use common\components\AccentComponent;

class AccentComponentTest  extends DbTestCase
{
    /* @var $_component AccentComponent */
    /* @var $_word Word */
    private $_component;
    private $_word;

    public function setUp()
    {
        parent::setUp();
        $this->_component = new AccentComponent();
        $this->_word = Word::findOne(2);
    }

    public function testPosition()
    {
        $positions = $this->_component->positions($this->_word);
        sort($positions);
        expect('found positions of accents', $positions)->equals([0,5]);
    }

    public function testFull()
    {
        $wordWithAccents = $this->_component->full($this->_word);
        expect('word with accents', $wordWithAccents)->equals('Т&#x301;естте&#x301;ст');
    }

    public function testLows()
    {
        $wordWithAccentsLowCase = $this->_component->lows($this->_word);
        expect('word with accents in low case', $wordWithAccentsLowCase)->equals('т&#x301;естте&#x301;ст');
    }

    public function testCaps()
    {
        $wordWithAccentsUpCase = $this->_component->caps($this->_word);
        expect('word with accents in upper case', $wordWithAccentsUpCase)->equals('Т&#X301;ЕСТТЕ&#X301;СТ');
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