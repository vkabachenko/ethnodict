<?php

namespace backend\models;

use Yii;
use common\models\CombinationCitation;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CombinationCitationSearch extends CombinationCitation
{

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
     * @param integer $id_combination
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($id_combination, $params)
    {
        $query = CombinationCitation::find()->where(['id_combination' => $id_combination])
            ->joinWith('region');
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