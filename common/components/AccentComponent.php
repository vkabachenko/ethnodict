<?php

namespace common\components;


use yii\base\Component;
use common\models\Word;
use common\models\WordAccent;
use common\helpers\Utf8;

class AccentComponent extends Component {

    /**
     * @param Word $word
     * @return array positions of accents
     **/
    public function positions($word)
    {
        $posArray = [];
        $wordAccents = WordAccent::find()->where(['id_word' => $word->id])->all();
        foreach ($wordAccents as $wordAccent ) {
            $posArray[] = $wordAccent->accent_position;
        }
        return $posArray;
    }

    /**
     * @param Word $word
     * @return string title with accents
     **/
    public function full($word)
    {
        $title = $word->title;
        $posArray = $this->positions($word);
        rsort($posArray,SORT_NUMERIC); // descending
        foreach ($posArray as $pos) {
            $title = Utf8::mb_substr_replace($title,"&#x301;",$pos + 1,0);
        }
        return $title;
    }
} 