<?php

namespace common\models\parents;


use yii\db\ActiveRecord;
use common\models\Region;

class ParentCitation extends ActiveRecord
{
    public $name_region;

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }

    /**
     * @return array
     */
    public function fields()
    {
        return array_merge(parent::fields(), ['name_region']);
    }

}