<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\history */
/* @var $form yii\widgets\ActiveForm */

//echo '<pre>';            print_r($data);            echo '</pre>';

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



    <div class="history-form">

        <?php $form = ActiveForm::begin([
            'id' => 'history-form',
            'options' => [
                'enctype' => 'multipart/form-data',
            ]
        ]); ?>

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">RU</a></li>
                <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">EN</a></li>
                <li class=""><a href="#tab4" data-toggle="tab" aria-expanded="false">Галерея</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'text_ru')->textarea(['maxlength' => true]) ?>
                </div>
                <div class="tab-pane" id="tab2">
                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'text_uz')->textarea(['maxlength' => true]) ?>
                </div>
                <div class="tab-pane" id="tab3">
                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'text_en')->textarea(['maxlength' => true]) ?>
                </div>
                <div class="tab-pane" id="tab4">

                    <div>Рекомендуемый размер:<br>ширина 600 px, высота 380 px</div>

                    <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображение</div>
                    <div id="image-preview" style="display:none">
                        <input type="file" id="img_preview_gallery" name="HistoryEvents[tmp_gallery_images][]"
                               class="image" accept="image/*" multiple />
                    </div>

                    <div id="preview_gallery">

                        <?php if ($gallery) {
                            foreach ($gallery as $gal) {
                                ?>
                                <span class="pip_old">
                                    <img class="imageThumb"
                                         src="/uploads/history-events/<?=$model->id ?>/gallery/thumb/<?= $gal->image . '?v=' . rand(1000000, 9999999) ?>"><br>
                                    <span class="remove-ajax" data-id="<?= $gal->id ?>">Удалить</span>
                                </span>
                            <?php }
                        } ?>

                    </div>

                    <input type="hidden" name="delete_gallery_files" id="delete_gallery_files">

                </div>


            </div>
        </div>


        <div class="form-group">
            <?= $form->field($model, 'date')->textInput(['type'=>'date','maxlength' => true])->label('Число-месяц-год: 01.06.2017') ?>
        <?php /*
            echo '<label>Дата</label>';
            echo DatePicker::widget([
                'name' => 'HistoryEvents[date]',
                'value' => date('d-m-Y', $model->date), // strtotime('+2 days')),
                'options' => ['placeholder' => 'Дата' ],
                'pluginOptions' => [
                    'language' => 'ru',
                    'format' => 'dd-mm-yyyy',
                    'autoclose' => true,
                    'todayHighlight' => true
                ]
            ]);
        */
        ?>
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
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
            <?php if(!$model->isNewRecord){ ?>
                    <a href="/admin/history/update?id=<?=$model->history_id ?>" class="btn btn-primary">Назад</a>

            <?php } ?>
        </div>

        <?php ActiveForm::end(); ?>



    </div>

<?php
$script = "
var s= '';
$('document').ready(function(){

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
            url: '/admin/history-events/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
	
    $('.img_preview_gallery').click(function(){
		$('#img_preview_gallery.image').click();
	});

   
	
});";
$this->registerJs($script, yii\web\View::POS_END);