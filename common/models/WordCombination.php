<?php

namespace common\models;

use Yii;
use common\models\parents\CitationInterface;

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
class WordCombination extends \yii\db\ActiveRecord implements CitationInterface
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
     * @return CombinationCitation
     */

    public static function getCitationModel()
    {
        return new CombinationCitation();
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
    public function getCitations()
    {
        return $this->hasMany(CombinationCitation::className(), ['id_parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCombinationCitations()
    {
        return $this->hasMany(CombinationCitation::className(), ['id_parent' => 'id'])
            ->select(['{{%combination_citation}}.*', 'name_region' => '{{%region}}.name'])
            ->joinWith('region')
            ->orderBy('name_region, fragment');
    }

    /**
     * @return array
     */
    public function fields()
    {
        return array_merge(parent::fields(), ['combinationCitations']);
    }

}
