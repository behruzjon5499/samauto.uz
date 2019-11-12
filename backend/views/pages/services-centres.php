<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.08.2017
 * Time: 17:01
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\backend\assets\EditorAsset::register($this);

$this->title = 'Сервисные центры';

$form = ActiveForm::begin(
    [
        'id' => 'page-form',
        //'enableClientValidation' => false,
        //'enableAjaxValidation' => false,
        'options' => [
            // 'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
        ]
    ]);?>

    <div class="col-md-12">

        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_about_desc_12" data-toggle="tab" aria-expanded="true">Текст RU</a></li>
                <li class=""><a href="#tab_about_desc_22" data-toggle="tab" aria-expanded="false">Текст UZ</a></li>
                <li class=""><a href="#tab_about_desc_32" data-toggle="tab" aria-expanded="false">Текст EN</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_about_desc_12">
                    <textarea name="info[text_ru]" class="form-control text_ru" rows="6"><?=@$data['text_ru']?></textarea>
                </div>
                <div class="tab-pane" id="tab_about_desc_22">
                    <textarea name="info[text_uz]" class="form-control text_uz" rows="6"><?=@$data['text_uz']?></textarea>
                </div>
                <div class="tab-pane" id="tab_about_desc_32">
                    <textarea name="info[text_en]" class="form-control text_en" rows="6"><?=@$data['text_en']?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div>Рекомендуемый размер:<br>ширина 1400 px, высота 500 px</div>
            <div class="btn btn-success img_preview" data-id="image">Загрузить изображение</div>
            <div id="image-preview" style="display:none">
                <input type="file" id="img_preview" name="Pages[tmp_image]" class="image" accept="image/*" />
            </div>
            <img width="300px" id="img_preview" class="thumb" src="<?= is_file($_SERVER['DOCUMENT_ROOT'] .'/frontend/web/uploads/services/centres.jpg') ? '/uploads/services/centres.jpg' : '' ?>" alt="">
        </div>



    </div>

    <input type="hidden" name="Pages[page]" value="services-centres">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php
$script = " 
$('document').ready(function(){

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

	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });

    $('.text_ru').wysihtml5();	   
    $('.text_uz').wysihtml5();	   
    $('.text_en').wysihtml5();	   
	
});";
$this->registerJs($script, yii\web\View::POS_END);

