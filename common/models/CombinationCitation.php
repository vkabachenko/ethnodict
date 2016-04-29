<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%combination_citation}}".
 *
 * @property integer $id
 * @property integer $id_combination
 * @property string $fragment
 * @property integer $id_region
 *
 * @property Region $region
 * @property WordCombination $wordCombination
 */
class CombinationCitation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%combination_citation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_combination'], 'required'],
            [['id_combination', 'id_region'], 'integer'],
            [['fragment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_combination' => 'Id Combination',
            'fragment' => 'Текст цитаты',
            'id_region' => 'Район',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordCombination()
    {
        return $this->hasOne(WordCombination::className(), ['id' => 'id_combination']);
    }
}