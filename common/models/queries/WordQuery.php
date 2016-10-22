<?php

namespace common\models\queries;

use yii\db\ActiveQuery;
use yii\db\Expression;

class WordQuery extends ActiveQuery
{
    public function firstLetterAndWord($category = null)
    {
        return $this->select(['firstLetter' => new Expression("substring(`title`,1,1)"),'title'])
            ->orderBy('firstLetter,title')
            ->where(['not',['description' => null]])
            ->andFilterWhere(['id_category' => $category])
            ->distinct();
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