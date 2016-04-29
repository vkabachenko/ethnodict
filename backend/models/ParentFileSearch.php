<?php

namespace backend\models;

use Yii;
use common\models\File;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\parents\FileInterface;

class ParentFileSearch extends File
{
    /* @var $parent \yii\db\ActiveRecord */
    protected $parent; // parent model for current file

    /**
     * @inheritdoc
     */
    public function __construct(FileInterface $parent, $config = [])
    {
        $this->parent = $parent;
        parent::__construct($config);
    }


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
     * @param integer $id_parent
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($id_parent, $params)
    {
        /* @var $query \yii\db\ActiveQuery */
        $query = $this->parent->findOne($id_parent)->getFiles();

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