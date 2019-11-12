<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin([
        'id' => 'documents-form',
        'options' => [
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>

    <div class="form-group">
        <?= $form->field($model, 'type')
            ->dropDownList(['Изображение', 'Файл'],
                $param = ['options' => [$model->type => ['Selected' => true]]]
            ); ?>
    </div>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <div id="load-image-block">

        <p>Рекомендуемый размер 800 px 800 px</p>
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="Documents[tmp_image]" id="img_preview" class="image"
                   accept="image/*">
        </div>

        <img width="100px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/documents/' . $model->id . '/thumb/' . $model->file . '?v=' . rand(1000000, 9999999) ?>" alt="">

    </div>

    <div id="load-file-block" style="display: none">

        <p>Загрузить файл (документ, архив)</p>
        <button class="btn btn-success file-load">Загрузить файл</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="Documents[tmp_file]" id="file_load">
        </div>
        <p id="file_name"></p>
        <?php
        /* <img width="100px" id="file_load" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/companies/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">
        */ ?>

    </div>

    <div class="form-group">
        <?= $form->field($model, "status")
            ->dropDownList([
                "0" => "Отключен",
                "1" => "Включен",
            ],
                $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
            );
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
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
    
    $(document).on('change','#file_load',function(){        
  		$('#file_name').text(document.getElementById('file_load').files[0].name);
    });
    
    $('#documents-type').change(function(){
        if($(this).val()==1){
            $('#load-image-block').fadeOut();
            $('#load-file-block').fadeIn();
        }else{
            $('#load-file-block').fadeOut();            
            $('#load-image-block').fadeIn();
        }
    })    
    $('#documents-type').change();
    
    $('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });
	
	$('.img_preview_gallery').click(function(){
		$('#img_preview_gallery.image').click();
	});
	$('.file-load').click(function(e){
	    e.preventDefault();
		$('#file_load').click();
		//alert($('#file_load').val())
	});
	
    if (window.File && window.FileList && window.FileReader) {

		$('#img_preview_gallery').on('change', function(e) {
			$('.pip').remove();
			$('#delete_gallery_files').val('');
		  var files = e.target.files,
			filesLength = files.length;
			img_gallery = filesLength;
			var file_id = 0;
			
			$(document).on('click','.remove',function(){
				//alert('delete '+$(this).parent('.pip').data('id'));
				$('#delete_gallery_files').val( $('#delete_gallery_files').val() +';'+ $(this).parent('.pip').data('id'))
				img_gallery--;
				$(this).parent('.pip').remove();
				if(img_gallery==0) $('input#img_preview_gallery').val('');
			});
			
		  for (var i = 0; i < filesLength; i++) {
			var f = files[i]
			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
			  var file = e.target;
			  file_id++;
			  
			
			  $('<span data-id=\"'+file_id+'\" class=\"pip\">' +
				'<img class=\"imageThumb\" src=\"' + e.target.result + '\" title=\"' + file.name + '\"/>' +
				'<br/><span class=\"remove\">Удалить</span>' +
				'</span>').insertAfter('#preview_gallery');
			 

			});
			fileReader.readAsDataURL(f);
		  }		  
		  
		});
	}		
	
	/*
	// удаление из фото-видео галереи
	$('.remove-ajax').click(function(){	
	    if(!confirm('Подтвердите удаление!') ) return false;
		var id = $(this).data('id');
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/companies/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	}); */	
	
	
	
});";
$this->registerJs($script, yii\web\View::POS_END);