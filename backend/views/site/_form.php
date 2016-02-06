<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Word */
/* @var $form yii\widgets\ActiveForm */

?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput([
        'maxlength' => true,
        'id' => 'word-title'
    ]) ?>

    <div id="div-accent">
        <label>Расставьте ударения</label>
        <table class="table-bordered">
            <tr class="row-accent"></tr>
            <tr class="row-word"></tr>
        </table>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            'Создать' : 'Сохранить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<!-- css and JavaScript -->

    <?php
        $this->registerCss("
            #div-accent {margin: 10px 0}
            #div-accent label {display: block}
            #div-accent td {text-align: center;padding:0 3px}
        ");

$accents = json_encode(Yii::$app->accent->positions($model));

        $script =
            <<<JS
var accents = $accents;

$('#word-title').on('focus',function() {
    accents = [];
    $('.row-accent input[type = "checkbox"]').each(function(i) {
        if ($(this).prop('checked')) {
            accents.push(i);
            }
        });
    });

$('#word-title').on('input',function() {
    $('#div-accent').find('td').remove();
    var word = $('#word-title').val();

    if (word.length == 0) {
        $('#div-accent label').hide();
        accents = [];
    } else {
        $('#div-accent label').show();
    }

    for (var i = 0; i < word.length; i++) {
       var inputname = 'checkaccent['+i+']';
       var td = $('<td>');
       $('<input type = "hidden">').attr('name',inputname).val('0').appendTo(td);
       $('<input type = "checkbox">').attr('name',inputname).val('1').appendTo(td);
       $.each(accents,function(index,position) {
           if (i == position) {
               td.find('input[type = "checkbox"]').prop('checked',true);
           }
       });
       td.appendTo('#div-accent .row-accent');
       $('<td>').text(word.charAt(i)).appendTo('#div-accent .row-word');
    }
});
$('#word-title').trigger('input');

JS;

$this->registerJs($script);

