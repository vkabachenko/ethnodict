<?php

use yii\helpers\Html;
use common\models\LiterarySource;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WordEtymology */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(); ?>

    <?= $form->field($model, 'id_source')
    ->dropDownList(LiterarySource::find()->select(['short_link','id'])->orderBy('short_link')->indexBy('id')->column()); ?>

    <?= $form->field($model, 'source_addition')->textInput([
    'maxlength' => true,
    ]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

