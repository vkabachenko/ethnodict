<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\CombinationCitationSearch;
use common\models\CombinationCitation;
use common\models\WordCombination;
use yii\web\NotFoundHttpException;

class CombinationCitationController extends Controller
{
    /**
     * @param $id integer id model WordCombination
     * @return string
     */
    public function actionIndex($id)
    {
        $wordCombination = WordCombination::findOne($id);
        $searchModel = new CombinationCitationSearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'wordCombination' => $wordCombination,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new CombinationCitation model.
     * @param $id_combination integer
     * @return mixed
     */
    public function actionCreate($id_combination)
    {
        $model = new CombinationCitation(['id_combination' => $id_combination]);
        $wordCombination = WordCombination::findOne($id_combination);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $id_combination]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'wordCombination' => $wordCombination
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
        $wordCombination = WordCombination::findOne($model->id_combination);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $model->id_combination]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'wordCombination' => $wordCombination
            ]);
        }
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /* @var $model CombinationCitation */
        $model = $this->findModel($id);
        $id_combination = $model->id_combination;
        $model->delete();

        return $this->redirect(['index', 'id' => $id_combination]);
    }

    /**
     * @param integer $id
     * @return CombinationCitation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CombinationCitation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 