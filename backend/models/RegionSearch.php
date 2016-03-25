<?php

namespace backend\models;

use Yii;
use common\models\Region;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RegionSearch extends Region
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Region::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['name' => SORT_ASC,]
            ],
            'pagination' => false,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}