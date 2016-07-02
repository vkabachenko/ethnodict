<?php
namespace backend\controllers;

use Yii;
use backend\models\LoginForm;
use backend\models\WordSearch;
use common\models\Word;
use yii\web\NotFoundHttpException;
use backend\services\AccentService;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['login', 'error'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        Yii::$app->session->set('page',Yii::$app->request->get('page'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $model = new Word();
        $this->saveModel($model);
        return $this->render('create',['model' => $model]);
    }

    /**
     * @param $id integer
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->saveModel($model);
        return $this->render('update',['model' => $model]);
    }

    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionUpload($id)
    {
        Yii::$app->session['fileInterface'] = 'common\models\Word';
        $this->redirect(['parent-file/index','id' => $id]);
    }

    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionCitation($id)
    {
        Yii::$app->session['citationInterface'] = 'common\models\Word';
        $this->redirect(['parent-citation/index','id' => $id]);
    }


    /**
     * @param $model Word
     * @return \yii\web\Response
     */
    private function saveModel($model)
    {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $accentService = new AccentService(['word' => $model]);
            $accentService->replace(Yii::$app->request->post('checkaccent'));
            return $this->redirect(['index','page' => Yii::$app->session->get('page')]);
        }
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
     * @return Word the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Word::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * @return string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
