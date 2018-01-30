<?php

namespace common\models;

use common\models\parents\ParentCitation;

/**
 * This is the model class for table "{{%combination_citation}}".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $fragment
 * @property integer $id_region
 *
 * @property Region $region
 * @property WordCombination $wordCombination
 */
class CombinationCitation extends ParentCitation
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
            [['id_parent'], 'required'],
            [['id_parent', 'id_region'], 'integer'],
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
            'id_parent' => 'Id parent',
            'fragment' => 'Текст цитаты',
            'id_region' => 'Район',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordCombination()
    {
        return $this->hasOne(WordCombination::className(), ['id' => 'id_parent']);
    }
}
