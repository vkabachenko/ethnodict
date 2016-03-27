<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%word_citation}}".
 *
 * @property integer $id
 * @property string $fragment
 * @property integer $id_region
 * @property integer $id_word
 *
 * @property Region $region
 * @property Word $word
 */
class WordCitation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word_citation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word'], 'required'],
            [['fragment'], 'string'],
            [['id_word','id_region'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_word' => 'Id Word',
            'fragment' => 'Текст цитаты',
            'id_region' => 'Район',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWord()
    {
        return $this->hasOne(Word::className(), ['id' => 'id_word']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }
}
