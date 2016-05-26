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
            [['upload_file'], 'file', 'maxSize' => \common\helpers\UploadHelper::fileUploadMaxSize(),],
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
    public function getParents(\common\models\parents\FileInterface $parent)
    {
        /* @var $parent \yii\db\ActiveRecord */
        return $this->hasMany($parent->className(), ['id' => 'id_parent'])
            ->viaTable('{{%parent_file}}', ['id_file' => 'id'],
              function($q) use ($parent) {
              /* @var $q \yii\db\ActiveQuery */
                 $q->andWhere(['parent_namespace' => $parent->className()]);
              });
    }
}
