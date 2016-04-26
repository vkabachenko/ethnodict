<?php

namespace common\models;

use common\helpers\Utf8;
use Yii;

/**
 * This is the model class for table "{{%word}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 *
 * @property WordAccent[] $wordAccents
 * @property WordVariant[] $wordVariants
 * @property WordCitation[] $wordCitations
 * @property WordCombination[] $wordCombinations
 * @property WordFolklore[] $wordFolklors
 * @property WordEtymology[] $wordEtymologies
 * @property File[] $files
 *
 */
class Word extends \yii\db\ActiveRecord
{
    public $variants_count;
    public $citations_count;
    public $folklors_count;
    public $etymologies_count;
    public $combinations_count;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%word}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'safe', 'on' => 'variant'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 40],
            ['description', 'safe', 'on' => 'default']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Словарное слово',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordAccents()
    {
        return $this->hasMany(WordAccent::className(), ['id_word' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordVariants()
    {
        return $this->hasMany(WordVariant::className(), ['id_word' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordCitations()
    {
        return $this->hasMany(WordCitation::className(), ['id_word' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordCombinations()
    {
        return $this->hasMany(WordCombination::className(), ['id_word' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordFolklors()
    {
        return $this->hasMany(WordFolklore::className(), ['id_word' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordEtymologies()
    {
        return $this->hasMany(WordEtymology::className(), ['id_word' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['id' => 'id_file'])
            ->viaTable('{{%word_file}}', ['id_word' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->title = Utf8::mb_ucfirst($this->title);
            return true;
        } else {
            return false;
        }
    }


}
