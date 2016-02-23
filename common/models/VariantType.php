<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%variant_type}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property WordVariant[] $wordVariants
 */
class VariantType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%variant_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWordVariants()
    {
        return $this->hasMany(WordVariant::className(), ['id_type' => 'id']);
    }
}
