<?php

namespace common\models\queries;

use yii\db\ActiveQuery;
use yii\db\Expression;

class WordQuery extends ActiveQuery
{
    public function inList($category = null)
    {
        return $this
            ->where(['>','description', ''])
            ->andFilterWhere(['id_category' => $category])
            ->orderBy('title');
    }

    /**
     * @inheritdoc
     * @return \common\models\Word|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    /**
     * @inheritdoc
     * @return \common\models\Word|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}