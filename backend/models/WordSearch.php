<?php

namespace backend\models;

use Yii;
use common\models\Word;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use backend\models\traits\OperandSearchTrait;


class WordSearch extends Word
{
    use OperandSearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'description',
                    'variants_count',
                    'citations_count',
                    'folklors_count',
                    'etymologies_count',
                ], 'safe'],
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

        $query = Word::find()->with('wordAccents')
            ->joinWith([
                'wordVariants',
                'wordCitations',
                'wordFolklors',
                'wordEtymologies',
            ],false)
            ->select([
                '{{%word}}.*',
                'variants_count' => new Expression('COUNT(DISTINCT {{%word_variant}}.id)'),
                'citations_count' => new Expression('COUNT(DISTINCT {{%word_citation}}.id)'),
                'folklors_count' => new Expression('COUNT(DISTINCT {{%word_folklore}}.id)'),
                'etymologies_count' => new Expression('COUNT(DISTINCT {{%word_etymology}}.id)'),
            ])
            ->groupBy('{{%word}}.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['title' => SORT_ASC,'description' => SORT_ASC,],
                'attributes' => [
                    'title',
                    'description',
                    'variants_count',
                    'citations_count',
                    'folklors_count',
                    'etymologies_count'
                ]
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

        $columnsWithOperands = [
            'description',
            'variants_count',
            'citations_count',
            'folklors_count',
            'etymologies_count',
        ];
        $this->operandConditions($query, $columnsWithOperands);

        return $dataProvider;
    }
}