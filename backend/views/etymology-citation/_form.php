<?php

use yii\helpers\Html;
use common\models\Region;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EtymologyCitation */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fragment')->textarea(); ?>

    <?= $form->field($model, 'id_region')
    ->dropDownList(Region::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column()); ?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

