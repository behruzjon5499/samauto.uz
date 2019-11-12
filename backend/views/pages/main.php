<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Главная страница';

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>
    <style>
        .filter{
            float:left;
            width:30%;
            padding:5px;

        }

    .thumb-info{
        width:150px;

    }
   
	.imageThumb {
	  max-height: 100px;
	  border: 1px solid #aaa;
	  padding: 5px;
	  cursor: pointer;					  
	}
	.pip,
	.pip_old{
	  display: inline-block;
	  margin: 10px 10px 0 0;
	}
	.remove,
	.remove-ajax
	{
	  display: block;
	  background: red;
	  border: 1px solid #aaa;
	  color: white;
	  text-align: center;
	  cursor: pointer;
	}
	.remove:hover,
	.remove-ajax:hover{
	  background: #cc2406;
	  //color: black;
	}

    .image-block-row {
        height:120px;padding:20px;
    }
    .margin{
        margin-bottom:20px;
    }

</style>
    <div class="pages-form">

        <?php $form = ActiveForm::begin(
            [
                'id' => 'auto-form',
                //'enableClientValidation' => false,
                //'enableAjaxValidation' => false,
                'options' => [
                    //'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                ]
            ]);?>

        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Информация</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Обзор</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Контакты</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab5_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                                <li class=""><a href="#tab5_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                                <li class=""><a href="#tab5_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab5_1">
                                    <label>Адрес</label>
                                    <input name="pages[title_ru]" class="form-control" value="<?=@$data['title_ru']?>">
        
                                    <label>Описание</label>
                                    <textarea name="pages[about_ru]" class="form-control"><?=@$data['about_ru']?></textarea>
                                </div>
                                <div class="tab-pane" id="tab5_2">
                                    <label>Адрес</label>
                                    <input name="pages[title_uz]" class="form-control" value="<?=@$data['title_uz']?>">

                                    <label>Описание</label>
                                    <textarea name="pages[about_uz]" class="form-control"><?=@$data['about_uz']?></textarea>
                                </div>
                                <div class="tab-pane" id="tab5_3">
                                    <label>Адрес</label>
                                    <input name="pages[title_en]" class="form-control" value="<?=@$data['title_en']?>">

                                    <label>Описание</label>
                                    <textarea name="pages[about_en]" class="form-control"><?=@$data['about_en']?></textarea>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="tab-pane" id="tab_2">

                        <div class="">
                            <div><strong>Изображение</strong></div>
                            <div>Рекомендуемый размер:<br>ширина 380 px, высота 195 px</div>
                        </div>

                        <div class="row margin">

                            <div class="col-md-6">

                                <div class="row margin">
                                    <div class="col-md-3">

                                        <div class="btn btn-success img_preview_info_block" data-id="1">+</div>
                                        <div class="btn btn-danger delete-info-img" data-id="1">-</div>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="image-preview" style="display:none">
                                            <input type="file" name="Pages[tmp_images][]" id="img_preview_1" class="image">
                                        </div>
                                        <img id="img_preview_1" class="thumb-info" src="<?= $model->isNewRecord ? '' : '/uploads/reviews/thumb/image_1.jpg' ?>" alt="">
                                    </div>
                                </div>

                                <div class="row margin">
                                    <div class="col-md-3">

                                        <div class="btn btn-success img_preview_info_block" data-id="2">+</div>
                                        <div class="btn btn-danger delete-info-img" data-id="1">-</div>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="image-preview" style="display:none">
                                            <input type="file" name="Pages[tmp_images][]" id="img_preview_2" class="image">
                                        </div>
                                        <img id="img_preview_2" class="thumb-info" src="<?= $model->isNewRecord ? '' : '/uploads/reviews/thumb/image_2.jpg' ?>" alt="">
                                    </div>
                                </div>

                                <div class="row margin">
                                    <div class="col-md-3">

                                        <div class="btn btn-success img_preview_info_block" data-id="3">+</div>
                                        <div class="btn btn-danger delete-info-img" data-id="1">-</div>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="image-preview" style="display:none">
                                            <input type="file" name="Pages[tmp_images][]" id="img_preview_3" class="image">
                                        </div>
                                        <img id="img_preview_3" class="thumb-info" src="<?= $model->isNewRecord ? '' : '/uploads/reviews/thumb/image_3.jpg' ?>" alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab6_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                                        <li class=""><a href="#tab6_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                                        <li class=""><a href="#tab6_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab6_1">
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_00" name="pages[0][title_ru]" class="form-control" value="<?=@$data[0]['title_ru']?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_10" name="pages[1][title_ru]" class="form-control" value="<?=@$data[1]['title_ru']?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_20" name="pages[2][title_ru]" class="form-control" value="<?=@$data[2]['title_ru']?>">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6_2">
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_01" name="pages[0][title_uz]" class="form-control" value="<?=@$data[0]['title_uz']?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_11" name="pages[1][title_uz]" class="form-control" value="<?=@$data[1]['title_uz']?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_21" name="pages[2][title_uz]" class="form-control" value="<?=@$data[2]['title_uz']?>">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6_3">
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->                                                
                                                <input id="area_02" name="pages[0][title_en]" class="form-control" value="<?=@$data[0]['title_en']?>">

                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_12" name="pages[1][title_en]" class="form-control" value="<?=@$data[1]['title_en']?>">

                                            </div>
                                            <div class="col-md-12">
                                                <label>Заголовок:</label>
                                                <!-- Custom Tabs -->
                                                <input id="area_22" name="pages[2][title_en]" class="form-control" value="<?=@$data[2]['title_en']?>">

                                            </div>
                                        </div>
                                        <span class="clearfix"></span>
                                    </div>
                                </div>

                            </div>


                        </div>


                    </div>

                    <!-- /.tab-pane контакты -->
                    <div class="tab-pane" id="tab_4">

                        <label>Телефон</label>
                        <input type="text" name="pages[phone]" class="form-control" value="<?=@$data['phone']?>">
                        <br>
                        <label>facebook</label>
                        <input type="text" name="pages[fb]" class="form-control" value="<?=@$data['fb']?>">
                        <br>
                        <label>telegram</label>
                        <input type="text" name="pages[telegram]" class="form-control" value="<?=@$data['telegram']?>">
                        <br>
                        <label>vk</label>
                        <input type="text" name="pages[vk]" class="form-control" value="<?=@$data['vk']?>">
                        <br>
                            <label>instagram</label>
                        <input type="text" name="pages[insta]" class="form-control" value="<?=@$data['insta']?>">
                        <br>
                        <label>Email</label>
                        <input type="text" name="pages[email]" class="form-control" value="<?=@$data['email']?>">
                        <br>


                    </div>



                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>

        <input type="hidden" name="Pages[page]" value="main">


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php
$script = " 
$('document').ready(function(){

	var img_gallery = 0;
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
	//$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });
	
    /*$('.img_preview_gallery').click(function(){
		$('#img_preview_gallery.image').click();
	});*/
    $('.img_preview_info_block').click(function(e){ 
	    e.preventDefault();	
		//alert('#img_preview_'+$(this).data('id'))
	    $('#img_preview_'+$(this).data('id')+'.image').click(); 
	});
			
    /*if (window.File && window.FileList && window.FileReader) {

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
	}	*/ 
// удаление из фото-видео галереи
	$('.remove-ajax').click(function(){		    
	    if(!confirm('Подтвердите удаление!') ) return false;

		var id = $(this).data('id');
		//alert(id);
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/pages/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});	
	
	// удаление из фото-видео галереи
	$('.delete-info-img').click(function(){	
	    if(!confirm('Подтвердите удаление!') ) return false;

		var id = $(this).data('id');
		$('#img_preview_'+id +'.thumb-info').attr('src','');
		$.ajax({
			type: 'post',
            url: '/admin/pages/delete-image',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                //alert(data.status)
			},
            error: function(jqxhr, status, errorMsg) {
				//alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});	
 	
	
});";
$this->registerJs($script, yii\web\View::POS_END);