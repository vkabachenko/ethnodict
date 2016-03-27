<?php

namespace common\helpers;

use common\models\Region;
use yii\helpers\ArrayHelper;

class RegionHelper {

    /**
     * @return array
     */
    public static function namesArray()
    {
        $models = Region::find()->orderBy('name')->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

} 