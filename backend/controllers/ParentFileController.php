<?php

namespace backend\controllers;

use Yii;
use common\models\File;
use yii\web\NotFoundHttpException;
use common\models\parents\FileInterface;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class ParentFileController extends Controller
{
    /* @var $parent \yii\db\ActiveRecord */
    protected $parent;

    /**
     * @inheritdoc
     */
    public function __construct($id, $module, FileInterface $parent, $config = [])
    {
        $this->parent = $parent;
        parent::__construct($id, $module, $config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $path = StringHelper::basename($this->parent->className()).'File';
        $path = Inflector::camel2id($path);
        $this->viewPath = '@backend/views/'.$path;
    }


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

    public function actionIndex($id)
    {
        $parentModel = $this->parent->findOne($id);
        $searchModel = Yii::createObject('\backend\models\ParentFileSearch');
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'parentModel' => $parentModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new File model.
     * @param $id_parent integer
     * @return mixed
     */
    public function actionCreate($id_parent)
    {
        $model = new File(['scenario' => 'create']);
        /* @var $parentModel \yii\db\ActiveRecord */
        $parentModel = $this->parent->findOne($id_parent);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $parentModel->link('files',$model,['parent_namespace' => $this->parent->ClassName()]);
            return $this->redirect(['index', 'id' => $id_parent]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'parentModel' => $parentModel,
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
        $parentModel = $model->getParents($this->parent)->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id' => $parentModel->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'parentModel' => $parentModel
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
        $parentModel = $model->getParents($this->parent)->one();
        $model->delete();

        return $this->redirect(['index', 'id' => $parentModel->id]);
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