<?php

namespace backend\controllers;

use common\models\Word;
use common\models\WordVariant;
use Yii;
use backend\models\WordVariantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use backend\services\AccentService;
use common\helpers\WordHelper;
use yii\widgets\ActiveForm;
use common\helpers\Utf8;

class VariantController extends Controller
{
    /**
     * @param $id integer id model Word
     * @return string
     */
    public function actionIndex($id)
    {
        $word = Word::findOne($id);
        $searchModel = new WordVariantSearch();
        $dataProvider = $searchModel->search($id, Yii::$app->request->queryParams);

        return $this->render('index', [
            'word' => $word,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id_word integer
     * @return string
     */

    public function actionCreate($id_word)
    {
        /* @var $variant Word */
        $model = new WordVariant();
        $model->id_word = $id_word;
        $word = Word::findOne($id_word);

        $variant = $this->saveVariant(new Word());
        $this->saveModel($model, $variant);

        return $this->render('create', [
            'model' => $model,
            'word' => $word,
            'variant' => $variant
        ]);
    }


    /**
     * @param $id integer
     * @return string
     */

    public function actionUpdate($id)
    {
        /* @var $variant Word */

        $model = $this->findModel($id);
        $word = Word::findOne($model->id_word);

        $variant = $this->saveVariant(Word::findOne($model->id_variant));
        $this->saveModel($model, $variant);

        return $this->render('update', [
            'model' => $model,
            'word' => $word,
            'variant' => $variant
        ]);
    }

    /**
     * @param $variant Word
     * @return Word
     */

    private function saveVariant($variant)
    {
        $variant->scenario = 'variant';
        if ($variant->load(Yii::$app->request->post())) {

            if (WordHelper::changed($variant)) {
                $variant = WordHelper::newmodel($variant->title);
                $variant->save();
            }
            $accentService = new AccentService(['word' => $variant]);
            $accentService->replace(Yii::$app->request->post('checkaccent'));
        }
        return $variant;
    }


    /**
     * @param $model WordVariant
     * @param $variant Word
     */
    private function saveModel($model, $variant)
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->id_variant = $variant->id;
            if ($model->save()) {
                return $this->redirect(['index','id' => $model->id_word]);
            }
        }
    }

    /**
     * @param $id integer
     * @return Response
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $id_word = $model->id_word;
        $model->delete();

        return $this->redirect(['index','id' => $id_word]);
    }

    /**
     * @param $term string
     * @return array
     */

    public function actionAutocomplete($term)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $words = Word::find()
            ->where("title LIKE '$term%'")
            ->orderBy('title')
            ->limit(Yii::$app->params['wordVariant']['itemsAutocomplete'])
            ->all();

        $transfer = [];
        foreach ($words as $word) {
            $transfer[] = [
                'label' => Yii::$app->accent->full($word).'<span>'.Utf8::mb_trunc($word->description,50).'</span>',
                'value' => $word->title,
                'id' => $word->id
            ];
        }

        return $transfer;
    }

    /**
     * @param $id_word integer
     * @return array
     */
    public function actionAccent($id_word)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $word = Word::findOne($id_word);
        return Yii::$app->accent->positions($word);
    }

    /**
     * @param $id_word integer
     * @return array
     */

    public function actionValidate($id_word, $id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if (WordVariant::find()->where([
            'id' => $id,
            'id_word' => $id_word,
        ])->exists()) {
            return [];
        }
        $model = new WordVariant();
        $variant = new Word(['scenario' => 'variant']);
        if ($variant->load(Yii::$app->request->post())
            && $model->load(Yii::$app->request->post())) {

            $model->id_word = $id_word;
            $model->id_variant = $variant->id;
            return ActiveForm::validate($model);
            }
        return [];
    }


    /**
     * @param integer $id
     * @return WordVariant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WordVariant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



} 