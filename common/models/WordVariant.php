<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%word_variant}}".
 *
 * @property integer $id
 * @property integer $id_word
 * @property integer $id_variant
 * @property integer $id_type
 * @property string $comment
 *
 * @property Word $word
 * @property Word $variant
 * @property VariantType $type
 */
class WordVariant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word_variant}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word', 'id_variant', 'id_type'], 'required'],
            [['id_word', 'id_variant', 'id_type'], 'integer'],
            [['comment'], 'string', 'max' => 80],
            [['id_word', 'id_variant', 'id_type'], 'unique', 'targetAttribute' => ['id_word', 'id_variant', 'id_type'], 'message' => 'Такой вариант уже существует']
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
            'id_variant' => 'Вариант',
            'id_type' => 'Вид',
            'comment' => 'Дополнение',
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
    public function getVariant()
    {
        return $this->hasOne(Word::className(), ['id' => 'id_variant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(VariantType::className(), ['id' => 'id_type']);
    }

}
