<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%literary_source}}".
 *
 * @property integer $id
 * @property string $short_link
 * @property string $long_link
 */
class LiterarySource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%literary_source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_link', 'long_link'], 'required'],
            [['short_link'], 'string', 'max' => 20],
            [['long_link'], 'string', 'max' => 255],
            [['short_link'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short_link' => 'Обозначение',
            'long_link' => 'Библиографическое описание',
        ];
    }
}
