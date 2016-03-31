<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\VariantType;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use common\models\Word;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\WordVariant */
/* @var $form yii\widgets\ActiveForm */
/* @var $variant Word */

?>
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'validationUrl' => [
            'validate',
            'id_word' => $model->id_word],
            'id' => $model->id,
        ]
); ?>

    <?= $form->field($model, 'id_type')
    ->dropDownList(VariantType::find()->select(['name','id'])->orderBy('name')->indexBy('id')->column()); ?>

    <?= $form->field($variant, 'id')
    ->hiddenInput(['id' => 'variant-id'])
    ->label(false); ?>

   <?php
       $ajaxUrl = Url::to(['accent']);
   ?>
    <?= $form->field($variant, 'title')
    ->widget(AutoComplete::className(),[
        'clientOptions' => [
            'source' => Url::to(['autocomplete']),
        ],
        'clientEvents' => [
            'select' => new JsExpression("
                function(event,ui) {
                    $('#variant-id').val(ui.item.id);
                    $.ajax({
                        'url' : '$ajaxUrl',
                        'data': {'id_word' : ui.item.id },
                        'dataType' : 'json',
                        'success' : function(returnArr) {
                            accents = returnArr; // var accents defined in _form.php
                            $('#word-title').trigger('input');
                            $('#word-title').trigger('blur');
                            }
                        });
                }
            ")
        ],
        'options' => [
            'id' => 'word-title',
            'class' => 'form-control'
        ]
    ])
    ->label('Вариант'); ?>

<?= $this->render('//site/_accent',['model' => $variant]); ?>

<?= $form->field($model, 'comment')->textInput([
    'maxlength' => true,
]) ?>


<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

<?php

$script =
    <<<JS
$['ui']['autocomplete'].prototype['_renderItem'] = function(ul, item) {
    return $('<li>')
    .data('item.autocomplete', item)
    .append($('<a>').html(item.label))
    .appendTo(ul);
};

JS;

$this->registerJs($script);



