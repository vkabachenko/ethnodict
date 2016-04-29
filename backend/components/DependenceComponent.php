<?php

namespace backend\components;

use yii\base\Object;

class DependenceComponent extends Object
{
    public function init()
    {
        $fileInterface = \Yii::$app->session->get('fileInterface');
        if ($fileInterface) {
            \Yii::$container->set('common\models\parents\FileInterface', $fileInterface);
        }
    }

} 