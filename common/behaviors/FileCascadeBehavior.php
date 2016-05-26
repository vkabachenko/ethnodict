<?php

namespace common\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class FileCascadeBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteFiles',
        ];
    }

    public function deleteFiles($event)
    {
        foreach ($this->owner->files as $file) {
            /* @var $file \common\models\File */
            $file->delete();
        }
    }

} 