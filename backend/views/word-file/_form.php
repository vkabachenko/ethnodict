<?php

use yii\helpers\Html;
use common\models\Region;
use common\models\Folklore;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <?= $form->field($model, 'upload_file')->fileInput(); ?>

    <?= $form->field($model, 'description')->textarea(); ?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

