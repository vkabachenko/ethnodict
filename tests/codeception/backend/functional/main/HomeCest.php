<?php
namespace tests\codeception\backend\main;

use common\models\Word;
use tests\codeception\backend\FunctionalTester;
use tests\codeception\backend\_pages\main\DelWordPage;
use tests\codeception\backend\_pages\main\CreateWordPage;
use tests\codeception\backend\_pages\main\UpdateWordPage;

class HomeCest
{
    public $first;
    public $last;

    public function _before(FunctionalTester $I)
    {
        $this->first = Word::find()->orderBy('title')->one();
        $this->last = Word::find()->orderBy('title desc')->one();
        \Yii::$app->user->login(\vkabachenko\phpuser\User::findIdentity('admin'));
    }

    public function homePage(FunctionalTester $I)
    {
        $I->wantTo('ensure Home page');
        $I->amOnPage('/');
        $I->see('Список словарных слов и выражений','h1');

        $I->expectTo('found accents in the page');
        $I->see('&#x301;');

        $I->expectTo('found first word in the page');
        $I->seeElement('tr',['data-key' => $this->first->id]);

        $I->expectTo('found pagination');
        $I->see('1','.active a');
        $I->see('2','li a');

        $I->expectTo('found last word in the second page');
        $I->click('2','li a');
        $I->seeElement('tr',['data-key' => $this->last->id]);
    }


    public function deleteWord(FunctionalTester $I)
    {
        $I->expectTo('delete first shown word');
        DelWordPage::openBy($I, ['id' => $this->first->id]);
        $I->dontSeeRecord('common\models\Word',['id' => $this->first->id]);
    }

    public function createWord(FunctionalTester $I)
    {
        $I->expectTo('create new word and capitalize first character');
        $createPage = CreateWordPage::openBy($I);
        $createPage->submit([
            'title' => 'test'
        ]);
        $I->seeRecord('common\models\Word',['title' => 'Test']);
    }

    public function updateWord(FunctionalTester $I)
    {
        $I->expectTo('update first shown word and return to first page');
        $updatePage = UpdateWordPage::openBy($I, ['id' => $this->first->id]);
        $updatePage->submit([
            'title' => 'test'
        ]);
        $I->seeRecord('common\models\Word',['title' => 'Test']);
        $I->see('Список словарных слов и выражений','h1');
        $I->see('1','.active a');
    }
}