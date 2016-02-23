<?php

namespace common\helpers;

use common\models\VariantType;
use yii\helpers\ArrayHelper;

class VariantTypeHelper {

    /**
     * @return array
     */
    public static function typesArray()
    {
        $models = VariantType::find()->orderBy('name')->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

} 