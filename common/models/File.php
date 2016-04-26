<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%file}}".
 *
 * @property integer $id
 * @property string $upload_file
 * @property string $description
 * @property Word[] $words
 * @mixin \yiidreamteam\upload\FileUploadBehavior
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => '\yiidreamteam\upload\FileUploadBehavior',
                'attribute' => 'upload_file',
                'filePath' => '@frontend/web/uploads/[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['upload_file'], 'file'],
            [['upload_file'], 'file', 'skipOnEmpty' => false, 'on' => 'create'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'upload_file' => 'Загрузить файл',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWords()
    {
        return $this->hasMany(Word::className(), ['id' => 'id_word'])
            ->viaTable('{{%word_file}}', ['id_file' => 'id']);
    }
}
