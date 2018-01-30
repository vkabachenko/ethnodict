<?php

namespace common\models;

use common\models\parents\ParentCitation;

/**
 * This is the model class for table "{{%etymology_citation}}".
 *
 * @property integer $id
 * @property integer $id_parent
 * @property string $fragment
 * @property integer $id_region
 *
 * @property Region $region
 * @property WordEtymology $wordEtymology
 */
class EtymologyCitation extends ParentCitation
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%etymology_citation}}';
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
    public function getWordEtymology()
    {
        return $this->hasOne(WordEtymology::className(), ['id' => 'id_parent']);
    }

}
