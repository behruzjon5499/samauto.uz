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
$this->title = 'Сервис - запчасти';

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
            <img width="300px" id="img_preview" class="thumb" src="<?= is_file($_SERVER['DOCUMENT_ROOT'] .'/frontend/web/uploads/services/parts.jpg') ? '/uploads/services/parts.jpg' : '' ?>" alt="">
        </div>


        <div class="form-group">


            <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображения логотипов</div>
            <div id="image-preview" style="display:none">
                <input type="file" id="img_preview_gallery" name="Pages[tmp_gallery_images][]"
                       class="image" accept="image/*" multiple/>
            </div>

            <div id="preview_gallery">

                <?php if (isset($data['gallery'])) {
                    foreach ($data['gallery'] as $id=>$gal) {
                        ?>
                        <span class="pip_old">
                            <img class="imageThumb"
                                 src="/uploads/services/gallery/<?= $gal . '?v=' . rand(1000000, 9999999) ?>"><br>
                            <span class="remove-ajax" data-id="<?= $id ?>">Удалить</span>
                        </span>
                    <?php }
                } ?>

            </div>

            <input type="hidden" name="delete_gallery_files" id="delete_gallery_files">

        </div>



    </div>

    <input type="hidden" name="Pages[page]" value="services-parts">

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
	    if(!confirm('Подтвердите удаление!') ) return false;
		var id = $(this).data('id');
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/pages/delete-gallery-part-item',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});

    $('.text_ru').wysihtml5();	   
    $('.text_uz').wysihtml5();	   
    $('.text_en').wysihtml5();	   
	
});";
$this->registerJs($script, yii\web\View::POS_END);

