<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= date('d.m.Y',$model->date); // $form->field($model, 'date')->textInput() ?>

    <?php
    echo $form->field($model, 'user_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(User::find()->all(),'id','name'),
            $param = ['options' => [$model->user_id => ['Selected' => true]]]

    );
    ?>
    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'status')
        ->dropDownList(['Отключен','Включен'],
            $param = ['options' => [$model->status => ['Selected' => true]]]
        ); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
