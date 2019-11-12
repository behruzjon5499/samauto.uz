<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Missions */
/* @var $form yii\widgets\ActiveForm */

 //echo '<pre>';            print_r($data);            echo '</pre>';


?>

<div class="missions-form">


    <?php $form = ActiveForm::begin([
        'id' => 'missions-form',
        'options' => [
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane" id="tab2">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane" id="tab3">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
            </div>

        </div>
    </div>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <p>Рекомендуемый размер 350 px 230 px</p>
    <button class="btn btn-success img_preview">Загрузить изображение</button>
    <div id="image-preview" style="display:none">
        <input type="file" name="Missions[tmp_image]" id="img_preview" class="image"
               accept="image/*">
    </div>

    <img width="300px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/missions/' . $model->id . '/' . $model->file  . '?v=' . rand(1000000, 9999999) ?>" alt="">

    <?php //= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="tabs-box">
    <?php if( is_array($data) ) {

        // print_r($data);

        foreach ($data as $key=>$item) {
           // echo $key . ' ' . $item['title_ru'];
        ?>

            <div class="nav-tabs-custom">
                <div class="btn btn-danger remove-mission pull-right" data-id="<?=$key ?>">Удалить</div>

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab<?=$key ?>_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                    <li class=""><a href="#tab<?=$key ?>_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                    <li class=""><a href="#tab<?=$key ?>_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab<?=$key ?>_1">
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Заголовок Ru</label>
                            <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[<?=$key ?>][title_ru]" value="<?=$item['title_ru']?>" maxlength="255" aria-invalid="false">
                        </div>
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Текст Ru</label>
                            <textarea id="missions-text_ru" class="form-control" name="MissionsItems[<?=$key ?>][text_ru]" maxlength="512" aria-invalid="false"><?=$item['text_ru']?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab<?=$key ?>_2">
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Заголовок Uz</label>
                            <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[<?=$key ?>][title_uz]" value="<?=$item['title_uz']?>" maxlength="255" aria-invalid="false">
                        </div>
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Текст Uz</label>
                            <textarea id="missions-text_ru" class="form-control" name="MissionsItems[<?=$key ?>][text_uz]" maxlength="512" aria-invalid="false"><?=$item['text_uz']?></textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab<?=$key ?>_3">
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Заголовок En</label>
                            <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[<?=$key ?>][title_en]" value="<?=$item['title_en']?>" maxlength="255" aria-invalid="false">
                        </div>
                        <div class="form-group field-missions-title_ru has-success">
                            <label class="control-label" for="missions-title_ru">Текст En</label>
                            <textarea id="missions-text_ru" class="form-control" name="MissionsItems[<?=$key ?>][text_en]" maxlength="512" aria-invalid="false"><?=$item['text_en']?></textarea>
                        </div>
                    </div>

                </div>
            </div>


        <?php }

    } ?>
    </div>


    <div class="btn btn-warning add-mission">Добавить блок описания миссии</div>
    <br><br>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <input type="hidden" name="remove-mission" id="remove_mission">

    <?php ActiveForm::end(); ?>

    <div id="tabs-hidden" style="display: none;">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab2_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                <li class=""><a href="#tab2_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                <li class=""><a href="#tab2_3" data-toggle="tab" aria-expanded="false">EN</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab2_1">
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Заголовок Ru</label>
                        <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[new][title_ru]" value="" maxlength="255" aria-invalid="false">
                    </div>
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Текст Ru</label>
                        <textarea id="missions-text_ru" class="form-control" name="MissionsItems[new][text_ru]" maxlength="512" aria-invalid="false"></textarea>
                    </div>
                </div>
                <div class="tab-pane" id="tab2_2">
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Заголовок Uz</label>
                        <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[new][title_uz]" value="" maxlength="255" aria-invalid="false">
                    </div>
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Текст Uz</label>
                        <textarea id="missions-text_ru" class="form-control" name="MissionsItems[new][text_uz]" maxlength="512" aria-invalid="false"></textarea>
                    </div>
                </div>
                <div class="tab-pane" id="tab2_3">
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Заголовок En</label>
                        <input type="text" id="missions-title_ru" class="form-control" name="MissionsItems[new][title_en]" value="" maxlength="255" aria-invalid="false">
                    </div>
                    <div class="form-group field-missions-title_ru has-success">
                        <label class="control-label" for="missions-title_ru">Текст En</label>
                        <textarea id="missions-text_ru" class="form-control" name="MissionsItems[new][text_en]" maxlength="512" aria-invalid="false"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?php
$script = "
var s= '';
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
    
    $('.add-mission').click(function(){
        tabs = $('#tabs-hidden').html();
        $('.tabs-box').append(tabs);
        $('.add-mission').fadeOut();    
    })
    
    $('.remove-mission').click(function(){
        $(this).fadeOut(); 
        $(this).parent().css('opacity','0.5');
        $(this).parent().find('input,textarea').prop('readonly',true);
        s += $(this).data('id') +',';        
        $('#remove_mission').val(s);
    })
	
});";
$this->registerJs($script, yii\web\View::POS_END);