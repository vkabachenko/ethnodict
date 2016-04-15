<?php
namespace tests\codeception\backend\main;

use common\models\WordVariant;
use tests\codeception\backend\AcceptanceTester;
use common\models\Word;
use tests\codeception\backend\_pages\variant\UpdateVariantPage;
use tests\codeception\backend\_pages\LoginPage;

class MainCest
{
    public function _before(AcceptanceTester $I)
    {
        $loginPage = LoginPage::openBy($I);
        $loginPage->login();
    }

    public function updateVariant(AcceptanceTester $I)
    {
        $I->wantTo('check entering existing word like variant');

        $word = Word::find()->orderBy('title')->one();
        $variant = WordVariant::find()->where(['id_word'=>$word->id])->one();
        $I->haveInDatabase(Word::getDb()->getSchema()->getRawTableName(Word::tableName()),['title' => 'Test']);
        $idTest = Word::find()->where(['title' => 'Test'])->one()->id;
        UpdateVariantPage::openBy($I,['id' => $variant->id]);

        $I->expectTo('see word "Test" in autocomplete list');
        $I->fillField('input[name="Word[title]"]','t');
        $I->wait(1);
        $I->see('Test','.ui-menu-item a');
        $I->click('Test');
        $I->wait(1);

        $I->expectTo('see id of word "Test" in hidden input field');
        $I->seeElementInDOM('input',['name' => 'Word[id]','value' => $idTest]);

        $I->expectTo('see checkboxes to fill accents');
        $I->seeNumberOfElements('input[type=checkbox]',4);
        $I->checkOption("input[type=checkbox][name='checkaccent[1]']");

        $I->expectTo('see word "Test" with accent as variant');
        $I->click('Сохранить');
        $I->wait(1);
        $I->see(html_entity_decode('Te&#x301;st'),'td');
    }
}