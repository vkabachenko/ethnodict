<?php

namespace common\helpers;

use common\models\Word;

class WordHelper {

    /**
     * @param $word Word
     * @return bool
     */
    public static function changed($word)
    {
        /* @var $model Word */
        if ($word->id == null) return true;
        $title = Utf8::mb_ucfirst($word->title);
        $model = Word::findOne($word->id);

        return $title !== $model->title;
    }

    /**
     * @param $title
     * @return Word
     */
    public static function newmodel($title)
    {
        $model = new Word(['title' => $title]);
        return $model;
    }

} 