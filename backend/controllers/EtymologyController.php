<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\WordEtymologySearch;
use common\models\WordEtymology;
use common\models\Word;
use yii\web\NotFoundHttpException;

class EtymologyController extends Controller
{

    /**
     * @param $id integer id model Word
     * @return string
     */
    public function actionIndex($id)
    {
        $word = Word::findOne($id);
        $searchModel = new WordEtymologySearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'word' => $word,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new WordEtymology model.
     * @param $id_word integer
     * @return mixed
     */
    public function actionCreate($id_word)
    {
        $model = new WordEtymology(['id_word' => $id_word]);
        $word = Word::findOne($id_word);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        $word = Word::findOne($model->id_word);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $model->id_word]);
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
        /* @var $model WordEtymology */
        $model = $this->findModel($id);
        $id_word = $model->id_word;
        $model->delete();

        return $this->redirect(['index', 'id' => $id_word]);
    }

    /**
     * @param integer $id
     * @return WordEtymology the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WordEtymology::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 