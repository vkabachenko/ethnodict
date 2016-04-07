<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\EtymologyCitationSearch;
use common\models\EtymologyCitation;
use common\models\WordEtymology;
use yii\web\NotFoundHttpException;

class EtymologyCitationController extends Controller
{
    /**
     * @param $id integer id model WordEtymology
     * @return string
     */
    public function actionIndex($id)
    {
        $wordEtymology = WordEtymology::findOne($id);
        $searchModel = new EtymologyCitationSearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'wordEtymology' => $wordEtymology,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new EtymologyCitation model.
     * @param $id_etymology integer
     * @return mixed
     */
    public function actionCreate($id_etymology)
    {
        $model = new EtymologyCitation(['id_etymology' => $id_etymology]);
        $wordEtymology = WordEtymology::findOne($id_etymology);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $id_etymology]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'wordEtymology' => $wordEtymology
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
        $wordEtymology = WordEtymology::findOne($model->id_etymology);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $model->id_etymology]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'wordEtymology' => $wordEtymology
            ]);
        }
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        /* @var $model EtymologyCitation */
        $model = $this->findModel($id);
        $id_etymology = $model->id_etymology;
        $model->delete();

        return $this->redirect(['index', 'id' => $id_etymology]);
    }

    /**
     * @param integer $id
     * @return EtymologyCitation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EtymologyCitation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 