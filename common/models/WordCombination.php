<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%word_citation}}".
 *
 * @property integer $id
 * @property string $combination
 * @property string $explanation
 * @property integer $id_word
 *
 * @property Word $word
 */
class WordCombination extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word_combination}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word','combination'], 'required'],
            [['combination','explanation'], 'string'],
            [['id_word'], 'integer']
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
            'combination' => 'Текст словосочетания',
            'explanation' => 'Комментарий',
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
