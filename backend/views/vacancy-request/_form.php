<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
mihaildev\elfinder\Assets::noConflict($this);
?>

<div class="vacancy-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'vacancy-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>
    <?= $form->field($model, "vacancy_id")
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Vacancy::find()->all(),'id','title_ru'), $param = ["options" => [$model->vacancy_id => ["selected" => true]]]);
    ?>

    <?= $form->field($model, "secondname")->textInput();?>
    <?= $form->field($model, "firstname")->textInput();?>
    <?= $form->field($model, "thirdname")->textInput();?>
    <?= $form->field($model, "phone")->textInput();?>
    <?= $form->field($model, "email")->textInput();?>
    <?= $form->field($model, "status")
        ->checkbox([$model->status => ["selected" => true], 'label' => 'Просмотрен']);
    ?>

    <?if(!$model->isNewRecord):?>
        <?= Html::a($model->resume_file, ['/uploads/resume/' . $model->resume_file,], ['class' => 'btn btn-primary', 'style' => 'margin-bottom: 10px;']) ?>
    <?endif;?>

    <?= $form->field($model, 'file')->fileInput()->label($model->isNewRecord ? true : false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
