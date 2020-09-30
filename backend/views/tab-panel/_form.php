<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\TabPanel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tab-panel-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'tab-panel-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabLang_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tabLang_2" data-toggle="tab" aria-expanded="true">UZ</a></li>
            <li class=""><a href="#tabLang_3" data-toggle="tab" aria-expanded="true">EN</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="tabLang_1">

                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'content_ru')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_2">

                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'content_uz')->textarea(['rows' => 14]) ?>


            </div>

            <div class="tab-pane " id="tabLang_3">

                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'content_en')->textarea(['rows' => 14]) ?>


            </div>



        </div>
    </div>
    <div class="row">
        <div class="col-md-6"> <?php echo $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'dropZoneTitle' => 'Загрузите аватар.',
                    'msgPlaceholder' => 'Загрузите аватар.',
                    'initialPreviewAsData'=>true,
                    'initialPreview' => [
                        $model->photo ? '<img src="/uploads/tab-panel/' . $model->photo . '" width="200">': '<img src="/uploads/tab-panel/no-image.png" width="200">',
                    ],
                    'showRemove' => false,
                    'showUpload' => false,

                ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, "transport_id")
                ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Transport::find()->all(),'id','title_ru'), $param = ["options" => [$model->transport_id => ["selected" => true]]]);
            ?>

            <?= $form->field($model, "status")
                ->dropDownList([
                    "0" => "Отключен",
                    "1" => "Включен",
                ], $param = ["options" => [$model->status => ["selected" => true]]]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $script = "$('document').ready(function(){
    
	$(document).on('change','.image',function(){
	  var input = $(this)[0];
	  var obj = $(this);
	  if ( input.files && input.files[0] ) {
		if ( input.files[0].type.match('image.*') ) {
		  var reader = new FileReader();
		  reader.onload = function(e){ $('img#'+obj.attr('id')).attr('src', e.target.result);}
		  reader.readAsDataURL(input.files[0]);
		} else console.log('is not image mime type');
	  } else console.log('not isset files data or files API not support');  
	});  
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });});";$this->registerJs($script, yii\web\View::POS_END);