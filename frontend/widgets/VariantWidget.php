<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use common\models\Word;

class VariantWidget extends Widget
{
    public $word;

    public function run()
    {
        $variants = Word::find()
            ->select(['{{%word}}.*','variant_type' => '{{%variant_type}}.name','variant_comment' => '{{%word_variant}}.comment'])
            ->joinWith(['variants','variants.type'],false)
            ->with('wordAccents')
            ->where(['{{%word_variant}}.id_word' => $this->word->id])
            ->orderBy('{{%variant_type}}.order,{{%word}}.title')
            ->all();

        // all distinct types from query -- in array
        $types = [];
        foreach($variants as $word) {
            $type = $word->variant_type;
            if (!in_array($type, $types)) {
                $types[] = $type;
            }
        }

        // print all variants group by type
        $out = '';
        foreach($types as $type) {
            $out .= $this->printVariantType($type, $variants);
        }
        return $out;
    }

    /*
     * @parameters $type \common\models\VariantType
     * @parameters $variants[] WordVariant
     * #return string // Html code
     */

    private function printVariantType($type, $variants)
    {
        $title = Html::tag('h3',Html::encode($type));

        $words = [];
        foreach($variants as $word) {
            if ($word->variant_type == $type) {
                $wordName = \Yii::$app->accent->full($word);
                $wordName .= $word->variant_comment ? ' ('.$word->variant_comment.')' : '';
                if ($word->description > '') {
                    $words[] = Html::a($wordName, [\Yii::$app->params['routeWord'], 'title' => $word->title]);
                } else {
                    $words[] = $wordName;
                }
            }
        }
        $wordsList = Html::tag('p',implode($words,', '),['class' => 'variant-words']);

        return $title.$wordsList;
    }
}