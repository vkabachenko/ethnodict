<?php

namespace backend\controllers;

use Yii;
use backend\models\WordCombinationSearch;
use common\models\WordCombination;
use common\models\Word;
use yii\web\NotFoundHttpException;

class CombinationController extends Controller
{

    /**
     * @param $id integer id model Word
     * @return string
     */
    public function actionIndex($id)
    {
        $word = Word::findOne($id);
        $searchModel = new WordCombinationSearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'word' => $word,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new WordCombination model.
     * @param $id_word integer
     * @return mixed
     */
    public function actionCreate($id_word)
    {
        $model = new WordCombination(['id_word' => $id_word]);
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
        /* @var $model WordCombination */
        $model = $this->findModel($id);
        $id_word = $model->id_word;
        $model->delete();

        return $this->redirect(['index', 'id' => $id_word]);
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionCitation($id)
    {
        Yii::$app->session['citationInterface'] = 'common\models\WordCombination';
        $this->redirect(['parent-citation/index','id' => $id]);
    }

    /**
     * @param integer $id
     * @return WordCombination the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WordCombination::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 