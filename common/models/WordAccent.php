<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%word_accent}}".
 *
 * @property integer $id
 * @property integer $id_word
 * @property integer $accent_position
 *
 * @property Word $idWord
 */
class WordAccent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word_accent}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word', 'accent_position'], 'required'],
            [['id_word', 'accent_position'], 'integer'],
            [['id_word', 'accent_position'], 'unique', 'targetAttribute' => ['id_word', 'accent_position'], 'message' => 'The combination of Id Word and Accent Position has already been taken.']
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
            'accent_position' => 'Accent Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWord()
    {
        return $this->hasOne(Word::className(), ['id' => 'id_word']);
    }
}
