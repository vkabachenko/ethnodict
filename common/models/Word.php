<?php

namespace common\models;

use Yii;
use common\helpers\Utf8;
use yii\db\ActiveRecord;
use common\models\parents\FileInterface;
use common\models\parents\CitationInterface;
use common\traits\FileTrait;
use common\behaviors\FileCascadeBehavior;
use common\models\queries\WordQuery;


/**
 * This is the model class for table "{{%word}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $id_category
 *
 * @property WordAccent[] $wordAccents
 * @property WordVariant[] $wordVariants
 * @property WordCitation[] $citations
 * @property WordCombination[] $wordCombinations
 * @property WordFolklore[] $wordFolklors
 * @property WordEtymology[] $wordEtymologies
 * @property File[] $files
 *
 */

class Word extends ActiveRecord implements FileInterface, CitationInterface
{
    use FileTrait;

    public $variants_count;
    public $citations_count;
    public $folklors_count;
    public $etymologies_count;
    public $combinations_count;
    public $firstLetter;


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
            ['description', 'safe', 'on' => 'default'],
            ['id_category', 'integer']
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
            'id_category' => 'Раздел'
        ];
    }

    /**
     * @inheritdoc
     * @return WordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WordQuery(get_called_class());
    }

    /**
     * @return WordCitation
     */

    public static function getCitationModel()
    {
        return new WordCitation();
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
    public function getCitations()
    {
        return $this->hasMany(WordCitation::className(), ['id_parent' => 'id']);
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
