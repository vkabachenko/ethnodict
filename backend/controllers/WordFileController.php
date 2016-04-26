<?php

namespace backend\controllers;

use Yii;
use backend\models\WordFileSearch;
use common\models\Word;
use common\models\File;
use yii\web\NotFoundHttpException;

class WordFileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'download' => [
                'class' => 'common\actions\DownloadAction',
            ],
        ];
    }

    /**
     * @param $id integer id model Word
     * @return string
     */
    public function actionIndex($id)
    {
        $word = Word::findOne($id);
        $searchModel = new WordFileSearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'word' => $word,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new File model.
     * @param $id_word integer
     * @return mixed
     */
    public function actionCreate($id_word)
    {
        $model = new File(['scenario' => 'create']);
        $word = Word::findOne($id_word);
        /* @var $word Word */

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $word->link('files',$model);
            return $this->redirect(['index', 'id' => $id_word]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'word' => $word
            ]);
        }
    }

    /**
     * @param $id integer
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $word = $model->words[0];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $word->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'word' => $word
            ]);
        }
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /* @var $model File */

        $model = $this->findModel($id);
        $word = $model->words[0];
        $model->delete();

        return $this->redirect(['index', 'id' => $word->id]);
    }

    /**
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 