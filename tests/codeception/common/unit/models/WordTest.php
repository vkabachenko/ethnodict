<?php

namespace tests\codeception\common\unit\models;

use common\models\Word;
use tests\codeception\common\unit\TestCase;
use Codeception\Specify;

class WordTest  extends TestCase
{

    use Specify;

    /* @var $_model Word */
    private $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = new Word();
    }

    public function testValidate()
    {
        $this->specify('Title fails empty string', function ()  {
            $this->_model->title = '';
            expect($this->_model->validate(['title']))->false();
        });

        $this->specify('Title fails very big string', function ()  {
            $this->_model->title = str_pad('',41,'*');
            expect($this->_model->validate(['title']))->false();
        });

        $this->specify('Title validates string', function ()  {
            $this->_model->title = str_pad('',40,'*');
            expect($this->_model->validate(['title']))->true();
        });

        $this->specify('id safe in variant scenario', function ()  {
            $this->_model->scenario = 'variant';
            expect($this->_model->isAttributeSafe('id'))->true();
        });

        $this->specify('id not safe', function ()  {
            expect($this->_model->isAttributeSafe('id'))->false();
        });
    }

    public function testBeforeSave()
    {

        $this->specify('title should be like a Word when insert', function ()  {
            $this->_model->title = 'тЕСТ';
            expect($this->_model->beforeSave(true))->true();
            expect($this->_model->title)->same('Тест');
        });

        $this->specify('title should be like a Word when update', function ()  {
            $this->_model->title = 'тЕСТ';
            expect($this->_model->beforeSave(false))->true();
            expect($this->_model->title)->same('Тест');
        });
    }
} 