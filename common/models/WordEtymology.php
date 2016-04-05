<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%word_etymology}}".
 *
 * @property integer $id
 * @property integer $id_word
 * @property string $description
 * @property integer $id_source
 * @property string $source_addition
 *
 * @property LiterarySource $literarySource
 * @property Word $word
 */
class WordEtymology extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word_etymology}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word'], 'required'],
            [['id_word', 'id_source'], 'integer'],
            [['description'], 'string'],
            [['source_addition'], 'string', 'max' => 255]
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
            'description' => 'Описание',
            'id_source' => 'Литературный источник',
            'source_addition' => 'Страницы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLiterarySource()
    {
        return $this->hasOne(LiterarySource::className(), ['id' => 'id_source']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWord()
    {
        return $this->hasOne(Word::className(), ['id' => 'id_word']);
    }
}
