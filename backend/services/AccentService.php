<?php

namespace backend\services;

use yii\base\Object;
use common\models\Word;
use common\models\WordAccent;

class AccentService extends Object
{
    /* @var $word Word */
    public $word;

    public function remove()
    {
        WordAccent::deleteAll(['id_word' => $this->word->id]);
    }

    /**
     * @param $accentPositions array
     */
    public function insert($accentPositions)
    {
        for ($i = 0; $i < count($accentPositions); $i++) {
            if ($accentPositions[$i] == 1 ) {
                $wordAccent = new WordAccent();
                $wordAccent->id_word = $this->word->id;
                $wordAccent->accent_position = $i;
                $wordAccent->insert();
            }
        }
    }

    /**
     * @param $accentPositions array
     */
    public function replace($accentPositions)
    {
        $this->remove();
        $this->insert($accentPositions);
    }

} 