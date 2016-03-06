<?php

namespace tests\codeception\backend\unit\services;

use common\models\Word;
use tests\codeception\backend\unit\DbTestCase;
use tests\codeception\common\fixtures\WordAccentFixture;
use tests\codeception\common\fixtures\WordFixture;
use backend\services\AccentService;

class AccentServiceTest extends DbTestCase {

    /* @var $_service AccentService */
    /* @var $_model Word */
    private $_service;
    private $_id_word = 1; // test word id
    private $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = Word::findOne($this->_id_word);
        $this->_service = new AccentService(['word' => $this->_model]);
    }

    public function insertDataProvider() {

        return [
          [[0, 0, 1], [0, 2]],
          [[1, 0, 1], [0, 2]]
        ];
    }

    /**
     * @dataProvider insertDataProvider
     */
    public function testInsert($in, $expected)
    {
        $this->_service->insert($in);
        $newPositions = $this->accentPositions();
        expect('insert accent positions',$newPositions)->equals($expected);
    }

    public function replaceDataProvider() {

        return [
            [[1, 0, 1], [0, 2]]
        ];
    }

    /**
     * @dataProvider replaceDataProvider
     */
    public function testReplace($in, $expected)
    {
        $this->_service->replace($in);
        $newPositions = $this->accentPositions();
        expect('replace accent positions',$newPositions)->equals($expected);
    }


    private function accentPositions()
    {
        $accents = $this->_model->wordAccents;
        $positions = [];
        foreach ($accents as $accent) {
            $positions[] = $accent->accent_position;
        }
        sort($positions);
        return $positions;
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