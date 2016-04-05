<?php

namespace backend\models;

use Yii;
use common\models\WordEtymology;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WordEtymologySearch extends WordEtymology
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description','source_addition'], 'safe'],
            [['id_source'], 'integer'],
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
        $query = WordEtymology::find()->where(['id_word' => $id_word])
            ->joinWith('literarySource');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id_source'=>[
                    'asc' => ['{{%literary_source}}.short_link' => SORT_ASC,],
                    'desc' => ['{{%literary_source}}.short_link' => SORT_DESC,],
                    'label'=>'LiterarySource',
                ],
                'description',
                'source_addition'
            ],
            'defaultOrder' => ['description' => SORT_ASC,]
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id_source' => $this->id_source]);
        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andFilterWhere(['like', 'source_addition', $this->source_addition]);

        return $dataProvider;
    }
}