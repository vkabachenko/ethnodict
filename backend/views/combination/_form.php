<?php

use yii\helpers\Html;
use common\models\Region;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WordCombination */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'combination')->textarea(); ?>
    <?= $form->field($model, 'explanation')->textarea(); ?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

