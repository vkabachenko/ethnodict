<?php

namespace common\models;

use Yii;
use common\helpers\Utf8;
use yii\db\ActiveRecord;
use common\models\parents\FileInterface;
use common\traits\FileTrait;
use common\behaviors\FileCascadeBehavior;


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

class Word extends ActiveRecord implements FileInterface
{
    use FileTrait;

    public $variants_count;
    public $citations_count;
    public $folklors_count;
    public $etymologies_count;
    public $combinations_count;


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            [
                'class' => FileCascadeBehavior::className(),
            ],
        ]);
    }

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
