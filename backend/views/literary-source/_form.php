<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LiterarySource */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'validationUrl' => [
            'validate',
            'id' => $model->id,
            ]
        ]
    ); ?>

<?= $form->field($model, 'short_link')->textInput([
    'maxlength' => true,
]) ?>
<?= $form->field($model, 'long_link')->textInput([
    'maxlength' => true,
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

