<?php
namespace tests\codeception\backend\variant;

use tests\codeception\backend\FunctionalTester;
use common\models\Word;
use common\models\WordVariant;
use tests\codeception\backend\_pages\variant\CreateVariantPage;
use tests\codeception\backend\_pages\variant\UpdateVariantPage;

class VariantCest
{
    public $word;
    public $variant;

    public function _before(FunctionalTester $I)
    {
        $this->word = Word::find()->orderBy('title')->one();
        $this->variant = WordVariant::find()->where(['id_word'=>$this->word->id])->one();
        $I->amOnPage(['variant/index','id'=>$this->word->id]);

    }

    public function mainPage(FunctionalTester $I)
    {
        $I->wantTo('ensure main variant page');

        $I->expectTo('found word title with accents in the header');
        $I->see(html_entity_decode(\Yii::$app->accent->lows($this->word)),'h1 strong');

        $I->expectTo('found right number of variants in the page');
        $number = WordVariant::find()->where(['id_word'=>$this->word->id])->count();
        $I->seeNumberOfElements('tbody tr',$number);
    }

    public function deleteVariant(FunctionalTester $I)
    {
        $I->wantTo('delete one variant');
        $I->seeRecord('common\models\WordVariant',['id' => $this->variant->id]);
        $I->amOnPage(['variant/delete','id'=>$this->variant->id]);
        $I->dontSeeRecord('common\models\WordVariant',['id' => $this->variant->id]);
    }

    public function createVariant(FunctionalTester $I)
    {
        $I->expectTo('create new variant with new word in Word\'s table');
        $createPage = CreateVariantPage::openBy($I,['id_word' => $this->word->id]);
        $createPage->submit([
            'id_type' => '1',
            'title' => 'test',
            'comment' => 'Test comment'
        ]);
        $I->seeRecord('common\models\Word',['title' => 'Test']);
        $I->see('Test','td');
        $I->see('Test comment','td');
    }

    public function updateVariant(FunctionalTester $I)
    {
        $I->expectTo('update variant with new variant word in Word\'s table');
        $I->see(html_entity_decode(\Yii::$app->accent->lows($this->variant->variant)),'td');
        $updatePage = UpdateVariantPage::openBy($I,['id' => $this->variant->id]);
        $updatePage->submit([
            'title' => 'test',
            'comment' => 'Test comment'
        ]);
        $I->seeRecord('common\models\Word',['title' => $this->variant->variant->title]);
        $I->seeRecord('common\models\Word',['title' => 'Test']);
        $I->see('Test','td');
        $I->see('Test comment','td');
        $I->dontSee(html_entity_decode(\Yii::$app->accent->lows($this->variant->variant)),'td');

    }


}