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


$this->title = 'Страница Символика';


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
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Флаг</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="">Герб</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="">Гимн</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <h4>Описание</h4>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_about_desc_11" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tab_about_desc_21" data-toggle="tab" aria-expanded="">UZ</a></li>
                            <li class=""><a href="#tab_about_desc_31" data-toggle="tab" aria-expanded="">EN</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_about_desc_11">
                                <textarea name="info[flag_ru]" id="flag_ru" class="form-control" rows="6"><?=@$data['flag_ru']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_21">
                                <textarea name="info[flag_uz]" id="flag_uz" class="form-control" rows="6"><?=@$data['flag_uz']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_31">
                                <textarea name="info[flag_en]" id="flag_en" class="form-control" rows="6"><?=@$data['flag_en']?></textarea>
                            </div>

                            <p>Рекомендуемый размер 500 px 500 px</p>
                            <button class="btn btn-success img_preview" data-img="flag">Загрузить изображение</button>
                            <div id="image-preview" style="display:none">
                                <input type="file" name="Pages[tmp_flag]" id="img_flag" class="image" accept="image/svg+xml">
                            </div>

                            <img width="250px" id="img_flag" class="thumb" src="/uploads/symbols/flag.svg?v=<?= rand(1000000,9999999) ?>" alt="">

                        </div>
                    </div>

                </div>

                <div class="tab-pane " id="tab_2">

                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <h4>Описание</h4>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_about_desc_12" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tab_about_desc_22" data-toggle="tab" aria-expanded="">UZ</a></li>
                            <li class=""><a href="#tab_about_desc_32" data-toggle="tab" aria-expanded="">EN</a></li>
                        </ul>
                        <div class="tab-content">
                            Описание
                            <div class="tab-pane active" id="tab_about_desc_12">
                                <textarea name="info[gerb_ru]" id="gerb_ru" class="form-control" rows="6"><?=@$data['gerb_ru']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_22">
                                <textarea name="info[gerb_uz]" id="gerb_uz" class="form-control" rows="6"><?=@$data['gerb_uz']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_32">
                                <textarea name="info[gerb_en]" id="gerb_en" class="form-control" rows="6"><?=@$data['gerb_en']?></textarea>
                            </div>

                            <p>Рекомендуемый размер 500 px 500 px</p>
                            <button class="btn btn-success img_preview" data-img="gerb">Загрузить изображение</button>
                            <div id="image-preview" style="display:none">
                                <input type="file" name="Pages[tmp_gerb]" id="img_gerb" class="image" accept="image/svg+xml">
                            </div>

                            <img width="250px" id="img_gerb" class="thumb" src="/uploads/symbols/gerb.svg?v=<?= rand(1000000,9999999) ?>" alt="">


                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="tab_3">

                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <h4>Описание</h4>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_about_desc_13" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tab_about_desc_23" data-toggle="tab" aria-expanded="">UZ</a></li>
                            <li class=""><a href="#tab_about_desc_33" data-toggle="tab" aria-expanded="">EN</a></li>
                        </ul>
                        <div class="tab-content">
                            <label>Описание</label>
                            <div class="tab-pane active" id="tab_about_desc_13">
                                <textarea name="info[gimn_title_ru]" class="form-control" rows="6"><?=@$data['gimn_title_ru']?></textarea>
                                <label>Гимн</label>
                                <textarea name="info[gimn_ru]" id="gimn_ru" class="form-control" rows="6"><?=@$data['gimn_ru']?></textarea>
                                <label>Автор</label>
                                <textarea name="info[gimn_author_ru]" class="form-control" rows="6"><?=@$data['gimn_author_ru']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_23">
                                <textarea name="info[gimn_title_uz]" class="form-control" rows="6"><?=@$data['gimn_title_uz']?></textarea>
                                <label>Гимн</label>
                                <textarea name="info[gimn_uz]" id="gimn_uz" class="form-control" rows="6"><?=@$data['gimn_uz']?></textarea>
                                <label>Автор</label>
                                <textarea name="info[gimn_author_uz]"  class="form-control" rows="6"><?=@$data['gimn_author_uz']?></textarea>
                            </div>
                            <div class="tab-pane" id="tab_about_desc_33">
                                <textarea name="info[gimn_title_en]"  class="form-control" rows="6"><?=@$data['gimn_title_en']?></textarea>
                                <label>Гимн</label>
                                <textarea name="info[gimn_en]" id="gimn_en" class="form-control" rows="6"><?=@$data['gimn_en']?></textarea>
                                <label>Автор</label>
                                <textarea name="info[gimn_author_en]" class="form-control" rows="6"><?=@$data['gimn_author_en']?></textarea>
                            </div>

                            <p>Рекомендуемый размер 500 px 500 px</p>
                            <button class="btn btn-success img_preview" data-img="gimn">Загрузить изображение</button>
                            <div id="image-preview" style="display:none">
                                <input type="file" name="Pages[tmp_gimn]" id="img_gimn" class="image" accept="image/svg+xml">
                            </div>

                            <img width="250px" id="img_gimn" class="thumb" src="/uploads/symbols/gimn.svg?v=<?=rand(1000000,9999999) ?>" alt="">

                        </div>
                    </div>

                </div>






            </div>
        </div>


    </div>


    <input type="hidden" name="Pages[page]" value="symbol">

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
	$('.img_preview').click(function(e){ 
	    e.preventDefault();
	    img = $(this).data('img'); 
	    $('#img_'+img+'.image').click();
    });
	
    $('#flag_ru').wysihtml5();
	$('#flag_uz').wysihtml5();
	$('#flag_en').wysihtml5();	

    $('#gerb_ru').wysihtml5();
	$('#gerb_uz').wysihtml5();
	$('#gerb_en').wysihtml5();	

    $('#gimn_ru').wysihtml5();
	$('#gimn_uz').wysihtml5();
	$('#gimn_en').wysihtml5();	

	
});";
$this->registerJs($script, yii\web\View::POS_END);

