<?php

namespace backend\models;

use Yii;
use common\models\LiterarySource;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class LiterarySourceSearch extends LiterarySource
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short_link','long_link'], 'safe'],
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
        $query = LiterarySource::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['short_link' => SORT_ASC,]
            ],
            'pagination' => false,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'short_link', $this->short_link]);
        $query->andFilterWhere(['like', 'long_link', $this->long_link]);
        return $dataProvider;
    }
}