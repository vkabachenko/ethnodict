<?php

namespace tests\codeception\backend\unit\models;

use Codeception\Specify;
use tests\codeception\backend\unit\DbTestCase;
use tests\codeception\common\fixtures\WordFixture;
use backend\models\WordSearch;

class WordSearchTest extends DbTestCase {

    /* @var $_model WordSearch */
    use Specify;
    public $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = new WordSearch();
    }

    protected function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testSearch()
    {

        $this->specify('returns all data in model when parameters are wrong', function ()  {
            $params = [
                'somekey' => 'somevalue'
            ];
            $actual = $this->_model->search($params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(2);
        });

        $this->specify('returns no data in model when no records found', function ()  {
            $params = [
                'WordSearch' => [
                    'title' => 'impossible'
                    ]
            ];
            $actual = $this->_model->search($params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(0);
        });

        $this->specify('returns all data in model when title matches all records', function ()  {
            $params = [
                'WordSearch' => [
                    'title' => 'тест'
                ]
            ];
            $actual = $this->_model->search($params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(2);
        });

        $this->specify('returns one in model when title matches one record', function ()  {
            $params = [
                'WordSearch' => [
                    'title' => 'тт'
                ]
            ];
            $actual = $this->_model->search($params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(1);
            expect($actual->models[0]->title)->equals('Тесттест');
        });
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