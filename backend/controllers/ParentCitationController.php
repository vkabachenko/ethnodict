<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use common\models\parents\CitationInterface;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class ParentCitationController extends Controller
{
    /* @var $parent \yii\db\ActiveRecord */
    protected $parent;

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, CitationInterface $parent, $config = [])
    {
        $this->parent = $parent;
        parent::__construct($id, $module, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $path = StringHelper::basename($this->parent->className()).'Citation';
        $path = Inflector::camel2id($path);
        $this->viewPath = '@backend/views/'.$path;
    }

    public function actionIndex($id)
    {
        /* @var $parentModel \common\models\parents\CitationInterface */
        $parentModel = $this->parent->findOne($id);
        $searchModel = Yii::createObject('\backend\models\ParentCitationSearch');
        $dataProvider = $searchModel->search($parentModel->getCitations(), Yii::$app->request->queryParams);

        return $this->render('index', [
            'parentModel' => $parentModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new сitation model.
     * @param $id_parent integer
     * @return mixed
     */
    public function actionCreate($id_parent)
    {
        /* @var $model \yii\db\ActiveRecord */
        $model = $this->parent->getCitationModel();
        $model->id_parent = $id_parent;
        $parent = $this->parent->findOne($id_parent);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $id_parent]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'parent' => $parent,
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
        $parent = $this->parent->findOne($model->id_parent);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $model->id_parent]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'parent' => $parent,
            ]);
        }
    }

    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $id_parent = $model->id_parent;
        $model->delete();

        return $this->redirect(['index', 'id' => $id_parent]);
    }

    /**
     * @param integer $id
     * @return mixed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /* @var  $citationModel \yii\db\ActiveRecord */
        $citationModel = $this->parent->getCitationModel();
        if (($model = $citationModel->findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


} 