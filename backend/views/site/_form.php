<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Word */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput([
    'maxlength' => true,
    'id' => 'word-title'
]) ?>

<?= $form->field($model, 'id_category')
    ->dropDownList(Category::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column(),['prompt' => 'Выбор']); ?>

<?= $form->field($model, 'description')->textarea(); ?>

<?= $this->render('_accent',['model' => $model]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

