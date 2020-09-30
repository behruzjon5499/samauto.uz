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

    <?= $form->field($model, "title_ru")->textInput(); ?>
    <?= $form->field($model, "title_uz")->textInput(); ?>
    <?= $form->field($model, "title_en")->textInput(); ?>


    <?php echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'dropZoneTitle' => 'Загрузите картинку.',
            'msgPlaceholder' => 'Загрузите картинку.',
            'initialPreviewAsData'=>true,
            'initialPreview' => [
                $model->preview_img ? '<img src="/uploads/career/main/' . $model->preview_img . '" width="200">': '<img src="/uploads/career/main/no-image.png" width="200">',
            ],
            'showRemove' => false,
            'showUpload' => false,

        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
