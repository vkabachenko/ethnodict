<?php

namespace backend\models;

use Yii;
use common\models\File;
use common\models\Word;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class WordFileSearch extends File
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description','upload_file'], 'string'],
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
        $query = Word::findOne($id_word)->getFiles();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            'sort' => ['defaultOrder' =>['upload_file' => SORT_ASC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'upload_file', $this->upload_file]);
        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}