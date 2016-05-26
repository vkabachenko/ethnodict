<?php

namespace common\traits;

use common\models\File;


trait FileTrait
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        /* @var $this \yii\db\ActiveRecord */
        return $this->hasMany(File::className(), ['id' => 'id_file'])
            ->viaTable('{{%parent_file}}', ['id_parent' => 'id'],
                function($q) {
                    /* @var $this \yii\db\ActiveRecord */
                    /* @var $q \yii\db\ActiveQuery */
                    $q->andWhere(['parent_namespace' => $this->className()]);
                });
    }

} 