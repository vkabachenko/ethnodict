<?php

namespace backend\models;

use Yii;
use common\models\EtymologyCitation;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class EtymologyCitationSearch extends EtymologyCitation
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
     * @param integer $id_etymology
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($id_etymology, $params)
    {
        $query = EtymologyCitation::find()->where(['id_etymology' => $id_etymology])
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