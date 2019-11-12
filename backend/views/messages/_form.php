<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'type')
        ->dropDownList([
            '0' => 'Из контактов',
        ], $param = ['options' => [$model->type => ['selected' => true]]]);
    ?>

    <label>Дата создания</label>
    <input type="text" value="<?=date('d.m.Y',$model->date)?>">
    <?php /*echo DatePicker::widget([
        'name' => 'Messages[date]',
        'value' => date('d-m-Y', $model->date),
        'options' => ['placeholder' => 'Дата создания' ],
        'pluginOptions' => [
            'language' => 'ru',
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ]); */
    ?>

    <?php /* echo '<label>Дата прочтения</label>';
    echo DatePicker::widget([
        'name' => 'Messages[date]',
        'value' => date('d-m-Y', $model->date_view),
        'options' => ['placeholder' => 'Дата прочтения' ],
        'pluginOptions' => [
            'language' => 'ru',
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ]); */
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>




    <?= $form->field($model, 'msg')->textArea(['maxlength' => true,'rows'=>6]) ?>

    <?php
    echo $form->field($model, 'status')
        ->dropDownList([
            '0' => 'Не прочитан',
            '1' => 'Прочитан',
        ], $param = ['options' => [$model->status => ['selected' => true]]]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
