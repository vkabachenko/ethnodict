<?php

namespace common\models;

use Yii;
use common\models\parents\FileInterface;
use common\traits\FileTrait;
use common\behaviors\FileCascadeBehavior;

/**
 * This is the model class for table "{{%word_folklore}}".
 *
 * @property integer $id
 * @property string $fragment
 * @property integer $id_region
 * @property integer $id_folklore
 * @property integer $id_word
 *
 * @property Region $region
 * @property Folklore $folklore
 * @property Word $word
 */
class WordFolklore extends \yii\db\ActiveRecord  implements FileInterface
{
    use FileTrait;

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
        return '{{%word_folklore}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_word'], 'required'],
            [['fragment'], 'string'],
            [['id_word','id_region','id_folklore'], 'integer']
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
            'fragment' => 'Текст цитаты',
            'id_region' => 'Район',
            'id_folklore' => 'Вид фольклора',
        ];
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
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFolklore()
    {
        return $this->hasOne(Folklore::className(), ['id' => 'id_folklore']);
    }

}
