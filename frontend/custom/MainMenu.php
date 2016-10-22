<?php

namespace frontend\custom;


use yii\base\Object;
use common\models\Word;
use yii\helpers\ArrayHelper;

class MainMenu extends Object
{

    const MAX_WORDS_IN_MENU_POINT = 10;
    const DEFAULT_ROUTE = 'site/word';

    /* @var $id_category integer */
    public $id_category;

    /* @var $_lettersWithWords array */ // ['А'=>['Амбар','Армяк',...],'Б'=>['Балахон','Баня',...],...]
    private $_lettersWithWords;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->_lettersWithWords = Word::find()
            ->firstLetterAndWord($this->id_category)
            ->asArray()
            ->all();
        $this->_lettersWithWords = ArrayHelper::map($this->_lettersWithWords,'title',null,'firstLetter');
        foreach($this->_lettersWithWords as $letter => $words) {
            $this->_lettersWithWords[$letter] = array_keys($words);
        }
    }

    /**
     * getter for $this->_lettersWithWords
     * @returns array
     *
     */
    public function getLettersWithWords()
    {
        return $this->_lettersWithWords;
    }

    /**
     * split $_lettersWithWords as:
     * ['А' => ['Амбар'], 'К'=>['Кабак','Капище','Конь','Корова']] to
     * ['А' => ['Амбар'], 'Каб..Кап' => ['Кабак','Капище'], 'Кон..Кор' => ['Конь','Корова']]
     */

    public function splitLongLists()
    {
        $partial = [];
        foreach($this->_lettersWithWords as $letter => $words) {
                $splitted = $this->multiSplit($letter, $words, self::MAX_WORDS_IN_MENU_POINT);
                foreach($splitted as $partLetter => $subWords) {
                    $partial[$partLetter] = $subWords;
                }
        }
        return $partial;
    }

    /**
     * split  array with one-letter key as described in previous func
     * @parameter $letter string
     * @parameter $words array
     * @parameter $maxLength integer // if array length <= maxLength returns original array
     * @returns array
     */
    private function multiSplit($letter, array $words, $maxLength)
    {
        if (count($words) <= $maxLength) {
            return [$letter => $words];
        }
        $returnArr = [];
        for($offset = 0; $offset < count($words); $offset += $maxLength) {
            $val= array_slice($words, $offset, $maxLength);
            $key = mb_substr(reset($val),0,3,'UTF-8').'..'.mb_substr(end($val),0,3,'UTF-8');
            $returnArr[$key] =  $val;
        }
        return $returnArr;
    }

    /**
     * @parameter $innerArray array // array with letters and words to construct menu items.
     * May be $this->getLettersWithWords() or $this->splitLongLists()
     * @parameter $route string
     *
     * @returns array //menu items following structure:
     * [
     *   ['label' => 'А', 'items' => [
     *      ['label' => 'Амбар', 'url' => ['site/word','Амбар']],
     *   ]],
     *   ..............................................,
     *   ['label' => 'Каб..Кап', 'items' => [
     *      ['label' => 'Кабак', 'url' => ['site/word','Кабак']],
     *      ['label' => 'Капище', 'url' => ['site/word','Капище']],
     *   ],
     *   ['label' => 'Кон..Кор', 'items' => [
     *      ['label' => 'Конь', 'url' => ['site/word','Конь']],
     *      ['label' => 'Корова', 'url' => ['site/word','Корова']],
     *   ],
     *   ]],
     *
     */

    public function menuItems($route = self::DEFAULT_ROUTE, $innerArray = null )
    {
        if ($innerArray == null) {
            $innerArray = $this->splitLongLists();
        }
        $items = [];
        foreach($innerArray as $letter => $words) {
            $item = ['label' => $letter, 'items' => []];
            foreach($words as $word) {
                    $item['items'][] = ['label' => $word, 'url' => [$route, 'title' => $word]];
            }
            $items[] = $item;
        }
        return $items;
    }

}