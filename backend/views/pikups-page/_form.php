<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\PikupsPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pikups-page-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'pikups-page-form',
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
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_ru" name="PikupsPage[content_ru]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->content_ru ?></textarea>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="tab_2">

                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_uz" name="PikupsPage[content_uz]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->content_uz ?></textarea>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="tab_3">

                <div class="row">
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <label class="box-title">Текст</label>
                        <textarea class="textarea_en" name="PikupsPage[content_en]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$model->content_en ?></textarea>
                    </div>
                </div>

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
                        $model->gallery_image ? '<img src="/uploads/pikups-page/' . $model->gallery_image . '" width="200">': '<img src="/uploads/irbis-gallery/no-image.png" width="200">',
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
        </div>
    </div>


    <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true]) ?>

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