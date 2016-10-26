<?php
namespace frontend\controllers;

use common\models\Word;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class SiteController extends Controller
{

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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionCategory()
    {
        $idCategory = \Yii::$app->request->post('idCategory');
        \Yii::$app->session->set('currentIdCategory', $idCategory);
        $this->redirect(['site/index']);
    }

    public function actionWord($title)
    {
       $word = Word::find()->where(['title' => $title])->one();
        if ($word === null) {
            throw new NotFoundHttpException();
        } else {
           return $this->render('word',['word' => $word]);
        }


    }


}
