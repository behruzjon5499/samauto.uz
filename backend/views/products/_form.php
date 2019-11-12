<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$lang = Yii::$app->session->get('lang');

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $modelInfo common\models\ProductInfo */
/* @var $form yii\widgets\ActiveForm */
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

    <div class="products-form">

        <?php $form = ActiveForm::begin(
            [
                'id' => 'product-form',
                //'enableClientValidation' => false,
                //'enableAjaxValidation' => false,
                'options' => [
                    //'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data',
                ]
            ]); ?>

        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Общие</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Опции</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Фото</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Галерея</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab2_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                                <li class=""><a href="#tab2_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                                <li class=""><a href="#tab2_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab2_1">

                                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'text_ru')->textarea() ?>

                                </div>
                                <div class="tab-pane" id="tab2_2">
                                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'text_uz')->textarea() ?>


                                </div>
                                <div class="tab-pane" id="tab2_3">
                                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'text_en')->textarea() ?>



                                </div>

                            </div>
                        </div>

                        <?php
                        /*echo $form->field($model, 'cat_id')
                            ->dropDownList(
                                ArrayHelper::map(\common\models\Categories::find()->all(), 'id', 'title')
                                , $param = ['options' => [$model->cat_id => ['selected' => true]]]);
                        ?>

                        <?php */

                        $categories = \common\models\Categories::find()->orderBy('parent_id ASC')->all();// where(['parent_id'=>0])->all(); // только корневые

                        ?>
                        <label>Категории</label>
                        <select class='form-control' name='Products[cat_id]'>
                            <?=\common\helpers\ListHelper::getSelectListFull($categories,['active_id'=>$model->cat_id])?>
                        </select>
                        <br>

                        <?php /*
                            echo $form->field($model, 'style_id')
                            ->dropDownList(
                                ArrayHelper::map(\common\models\Styles::find()->all(), 'id', 'title_ru')
                                , $param = ['options' => [$model->style_id => ['selected' => true]]]);
                        */ ?>


                        <?php //= $form->field($model_info, 'descr')->textarea(['rows'=>6]) ?>
                        <?php //= $form->field($model_info, 'info')->textarea(['rows'=>6]) ?>

                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="col-md-12">
                            <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'material_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'material_uz')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'material_en')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="tab-pane" id="tab_2">
                        <p>Рекомендуемый размер 500 px 300 px</p>
                        <button class="btn btn-success img_preview">Загрузить изображение</button>
                        <div id="image-preview" style="display:none">
                            <input type="file" name="Products[tmp_image]" id="img_preview" class="image"
                                   accept="image/*">
                        </div>

                        <img width="250px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/products/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">

                    </div>


                    <div class="tab-pane" id="tab_3">

                        <div>Рекомендуемый размер:<br>ширина 1200 px, высота 740 px</div>

                        <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображение</div>
                        <div id="image-preview" style="display:none">
                            <input type="file" id="img_preview_gallery" name="Products[tmp_gallery_images][]"
                                   class="image" accept="image/*" multiple/>
                        </div>

                        <div id="preview_gallery">

                            <?php if (isset($model->gallery)) {
                                foreach ($model->gallery as $gal) {
                                    ?>
                                    <span class="pip_old">
                                        <img class="imageThumb"
                                             src="/uploads/products/<?= $model->id . '/gallery/thumb/' . $gal->image . '?v=' . rand(1000000, 9999999) ?>"><br>
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

        <div class="form-group">
            <?= $form->field($model, 'status')
                ->dropDownList(['Недоступен', 'Доступен'],
                    $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
                ); ?>
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
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });
	$('.img_preview_top').click(function(e){ e.preventDefault(); $('#img_preview_top.image').click(); });
	$('.img_preview_banner').click(function(e){ e.preventDefault(); $('#img_preview_banner.image').click(); });
	
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
            url: '/admin/products/delete-gallery-item',            
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