<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class ParentCitationSearch extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Yii::$container->get('common\models\parents\CitationInterface')
            ->getCitationModel()->tableName();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment'], 'safe'],
            [['id_region'], 'integer'],
        ];
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param \yii\db\ActiveQuery $parentQuery
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($parentQuery, $params)
    {
        $query = $parentQuery->joinWith('region');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id_region'=>[
                    'asc' => ['{{%region}}.name' => SORT_ASC,],
                    'desc' => ['{{%region}}.name' => SORT_DESC,],
                    'label'=>'Region',
                ],
                'fragment'
            ],
            'defaultOrder' => ['id_region' => SORT_ASC,'fragment' => SORT_ASC,]
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id_region' => $this->id_region]);
        $query->andFilterWhere(['like', 'fragment', $this->fragment]);

        return $dataProvider;
    }
}