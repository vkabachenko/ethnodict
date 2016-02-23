<?php

namespace common\models;

use common\helpers\Utf8;
use Yii;

/**
 * This is the model class for table "{{%word}}".
 *
 * @property integer $id
 * @property string $title
 *
 * @property WordAccent[] $wordAccents
 */
class Word extends \yii\db\ActiveRecord
{
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
            [['title'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
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
