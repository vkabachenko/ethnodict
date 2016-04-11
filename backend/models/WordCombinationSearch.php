<?php

namespace backend\models;

use Yii;
use common\models\WordCombination;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WordCombinationSearch extends WordCombination
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['combination','explanation'], 'safe'],
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
     * @param integer $id_word
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($id_word, $params)
    {
        $query = WordCombination::find()->where(['id_word' => $id_word]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'explanation',
                'combination'

            ],
            'defaultOrder' => ['combination' => SORT_ASC,]
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'combination', $this->fragment]);
        $query->andFilterWhere(['like', 'explanation', $this->explanation]);

        return $dataProvider;
    }
}