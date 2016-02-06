<?php

namespace backend\models;

use Yii;
use common\models\Word;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WordSearch extends Word
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'safe'],
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
        $query = Word::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['title' => SORT_ASC,]
            ],
            'pagination' => [
                'pageSize' => Yii::$app->params['word']['pageSize'],
                'pageSizeParam' => false,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        return $dataProvider;
    }
}