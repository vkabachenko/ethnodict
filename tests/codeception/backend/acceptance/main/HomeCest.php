<?php
namespace tests\codeception\backend\main;

use common\models\WordAccent;
use tests\codeception\backend\AcceptanceTester;
use common\models\Word;
use tests\codeception\backend\_pages\main\UpdateWordPage;
use tests\codeception\backend\_pages\LoginPage;

class HomeCest
{

    public function _before(AcceptanceTester $I)
    {
        $loginPage = LoginPage::openBy($I);
        $loginPage->login();
    }

    public function updateWord(AcceptanceTester $I)
    {
        $I->wantTo('check accents in update page');
        $first = Word::find()->orderBy('title')->one();

        //***************************************************************
        $I->expectTo('number of cells in the accent table is equal to number of chars in the title');
        $numberCharsInWord = mb_strlen($first->title,'utf8');
        $updatePage = UpdateWordPage::openBy($I, ['id' => $first->id]);
        $I->seeNumberOfElements('.row-accent td',$numberCharsInWord);

        //***************************************************************
        $I->expectTo('accents in the table are in the right places');
        $accents = WordAccent::find()->where(['id_word' => $first->id ])->all();
        foreach ($accents as $accent) {
            $I->seeCheckboxIsChecked("input[type=checkbox][name='checkaccent[{$accent->accent_position}]']");
        }

        //***************************************************************
        $I->expectTo('add char to end of title results to add empty accent to table');
        $I->fillField('input[name="Word[title]"]',$first->title.'*');
        $I->seeNumberOfElements('.row-accent td',$numberCharsInWord + 1);
        $I->dontSeeCheckboxIsChecked("input[type=checkbox][name='checkaccent[$numberCharsInWord]']");

        //***************************************************************
        $I->expectTo('uncheck all accents and see there are no accents in the title in home page');
        foreach ($accents as $accent) {
            $I->uncheckOption("input[type=checkbox][name='checkaccent[{$accent->accent_position}]']");
        }
        $updatePage->submit([
            'title' => $first->title
        ]);
        $I->wait(2);
        $I->see($first->title,'td');

        //***************************************************************
        $I->expectTo('check first accent in update page and see it in main page');
        UpdateWordPage::openBy($I, ['id' => $first->id]);
        $I->checkOption("input[type=checkbox][name='checkaccent[0]']");
        $I->click('Сохранить');
        $I->wait(2);
        $I->see(html_entity_decode($first->title[0].'&#x301;'.mb_substr($first->title,1)));

    }
}