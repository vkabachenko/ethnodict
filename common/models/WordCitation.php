<?php

namespace common\models;

use common\models\parents\ParentCitation;

/**
 * This is the model class for table "{{%word_citation}}".
 *
 * @property integer $id
 * @property string $fragment
 * @property integer $id_region
 * @property integer $id_parent
 *
 * @property Region $region
 * @property Word $word
 */
class WordCitation extends ParentCitation
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
            [['id_parent'], 'required'],
            [['fragment'], 'string'],
            [['id_parent','id_region'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_parent' => 'Id Word',
            'fragment' => 'Текст цитаты',
            'id_region' => 'Район',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWord()
    {
        return $this->hasOne(Word::className(), ['id' => 'id_parent']);
    }

}
