<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


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

}
