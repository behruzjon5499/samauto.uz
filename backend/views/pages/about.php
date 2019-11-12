<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.08.2017
 * Time: 17:01
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Страница О нас';

?>

    <style>
        .thumb-info {
            width: 150px;
        }

        .imageThumb {
            max-height: 100px;
            border: 1px solid #aaa;
            padding: 5px;
            cursor: pointer;
        }

        .pip,
        .pip_old {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove,
        .remove-ajax {
            display: block;
            background: red;
            border: 1px solid #aaa;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover,
        .remove-ajax:hover {
            background: #cc2406;
        }

        .colors {
            float: left;
        }

        .color {
            width: 40px;
            height: 20px;
            float: left;
            margin: 0px 7px;
            cursor: pointer;
            border: 1px solid #ccc;
        }
    </style>

<?php

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

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Общие</a></li>
                <?php /* <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Галерея</a></li> */ ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_about_desc_11" data-toggle="tab" aria-expanded="true">Текст 1 RU</a></li>
                            <li class=""><a href="#tab_about_desc_21" data-toggle="tab" aria-expanded="false">Текст 1 UZ</a></li>
                            <li class=""><a href="#tab_about_desc_31" data-toggle="tab" aria-expanded="false">Текст 1 EN</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_about_desc_11">
                                <textarea name="info[about_ru]" class="form-control" rows="6"><?=@$data['about_ru']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_21">
                                <textarea name="info[about_uz]" class="form-control" rows="6"><?=@$data['about_uz']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_31">
                                <textarea name="info[about_en]" class="form-control" rows="6"><?=@$data['about_en']?></textarea>
                            </div>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_about_desc_12" data-toggle="tab" aria-expanded="true">Текст 2 RU</a></li>
                            <li class=""><a href="#tab_about_desc_22" data-toggle="tab" aria-expanded="false">Текст 2 UZ</a></li>
                            <li class=""><a href="#tab_about_desc_32" data-toggle="tab" aria-expanded="false">Текст 2 EN</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_about_desc_12">
                                <textarea name="info[about2_ru]" class="form-control" rows="6"><?=@$data['about2_ru']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_22">
                                <textarea name="info[about2_uz]" class="form-control" rows="6"><?=@$data['about2_uz']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_32">
                                <textarea name="info[about2_en]" class="form-control" rows="6"><?=@$data['about2_en']?></textarea>
                            </div>
                        </div>
                    </div>

                    <label>Ссылка на видео youtube</label>
                    <input  class="form-control" type="text" name="info[video_link]" value="<?=@$data['video_link']?>">


                </div>
                <div class="tab-pane" id="tab_2">

                    <div>Рекомендуемый размер:<br>ширина 600 px, высота 380 px</div>

                    <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображение</div>
                    <div id="image-preview" style="display:none">
                        <input type="file" id="img_preview_gallery" name="Gallery[tmp_gallery_images][]"
                               class="image" accept="image/*" multiple />
                    </div>

                    <div id="preview_gallery">

                        <?php if ($gallery) {
                            foreach ($gallery as $gal) {
                                ?>
                                <span class="pip_old">
                                    <img class="imageThumb"
                                         src="/uploads/gallery/about/thumb/<?= $gal->image . '?v=' . rand(1000000, 9999999) ?>"><br>
                                    <span class="remove-ajax" data-id="<?= $gal->id ?>">Удалить</span>
                                </span>
                            <?php }
                        } ?>

                    </div>

                    <input type="hidden" name="delete_gallery_files" id="delete_gallery_files">

                </div>
            </div>
        </div>


    </div>


    <input type="hidden" name="Pages[page]" value="about">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php
$script = " 
$('document').ready(function(){

	$('.img_preview_gallery').click(function(){
		$('#img_preview_gallery.image').click();
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
	
	// удаление из фото-видео галереи
	$('.remove-ajax').click(function(){
	    if( ! confirm( 'Подтвердите удаление!' ) ) return false;
		var id = $(this).data('id');		
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
	
});";
$this->registerJs($script, yii\web\View::POS_END);

