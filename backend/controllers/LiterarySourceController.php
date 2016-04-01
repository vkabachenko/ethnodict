<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\LiterarySourceSearch;
use common\models\LiterarySource;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class LiterarySourceController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LiterarySourceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new LiterarySource model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LiterarySource();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $id integer
     * @return array
     * Ajax validation
     */

    public function actionValidate($id = null)
    {
        if ($id) {
            $model = $this->findModel($id);
        } else {
            $model = new LiterarySource();
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            return ActiveForm::validate($model);
        }
        return [];
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return LiterarySource the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LiterarySource::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 