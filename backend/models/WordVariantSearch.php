<?php

namespace backend\models;

use Yii;
use common\models\WordVariant;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WordVariantSearch extends WordVariant
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_variant','comment'], 'safe'],
            [['id_type'], 'integer'],
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
        $query = WordVariant::find()->where(['id_word' => $id_word])
            ->joinWith('variant')->joinWith('type');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id_variant'=>[
                    'asc' => ['{{%word}}.title' => SORT_ASC,],
                    'desc' => ['{{%word}}.title' => SORT_DESC,],
                    'label'=>'Variant',
                ],
                'id_type'=>[
                    'asc' => ['{{%variant_type}}.name' => SORT_ASC,],
                    'desc' => ['{{%variant_type}}.name' => SORT_DESC,],
                    'label'=>'Type',
                ],
                'comment'
            ],
            'defaultOrder' => ['id_type' => SORT_ASC,'id_variant' => SORT_ASC,]
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id_type' => $this->id_type]);
        $query->andFilterWhere(['like', '{{%word}}.title', $this->id_variant]);
        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}