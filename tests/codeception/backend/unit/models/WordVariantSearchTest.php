<?php

namespace tests\codeception\backend\unit\models;

use Codeception\Specify;
use tests\codeception\backend\unit\TestCase;
use tests\codeception\common\fixtures\WordFixture;
use tests\codeception\common\fixtures\WordVariantFixture;
use backend\models\WordVariantSearch;

class WordVariantSearchTest extends TestCase {

    /* @var $_model WordVariantSearch */
    use Specify;
    public $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = new WordVariantSearch();
    }

    protected function tearDown()
    {
        $this->_model = null;
        parent::tearDown();
    }

    public function testSearch()
    {

        $this->specify('returns no data for wrong id_word', function ()  {
            $id_word = 999;
            $params = [
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(0);
        });

        $this->specify('returns all data in model when parameters are wrong', function ()  {
            $id_word = 2;
            $params = [
                'somekey' => 'somevalue'
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(2);
        });

        $this->specify('returns all data in model when when title matches all records', function ()  {
            $id_word = 2;
            $params = [
                'WordVariantSearch' => [
                    'id_variant' => 'тест'
                ]
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(2);
        });

        $this->specify('returns no data in model when when title matches no records', function ()  {
            $id_word = 2;
            $params = [
                'WordVariantSearch' => [
                    'id_variant' => 'impossible'
                ]
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(0);
        });

        $this->specify('returns one data in model when when title matches one record', function ()  {
            $id_word = 2;
            $params = [
                'WordVariantSearch' => [
                    'id_variant' => 'тт'
                ]
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(1);
            expect($actual->models[0]->id_variant)->equals(2);
        });

        $this->specify('returns one data in model when when type matches one record', function ()  {
            $id_word = 2;
            $params = [
                'WordVariantSearch' => [
                    'id_type' => 2
                ]
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(1);
            expect($actual->models[0]->id_variant)->equals(2);
        });

        $this->specify('returns one data in model when when comment matches one record', function ()  {
            $id_word = 2;
            $params = [
                'WordVariantSearch' => [
                    'comment' => 'comment'
                ]
            ];
            $actual = $this->_model->search($id_word, $params);
            expect($actual)->isInstanceOf('yii\data\ActiveDataProvider');
            expect($actual->count)->equals(1);
            expect($actual->models[0]->id_variant)->equals(2);
        });

    }


    /**
     * @inheritdoc
     */
    public function fixtures()
    {
        return [
                  WordFixture::className(),
                  WordVariantFixture::className(),
               ];
    }

} 