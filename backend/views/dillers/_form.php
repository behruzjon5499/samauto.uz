<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Dillers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dillers-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'dillers-form',
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
                            <li class="active"><a href="#tabLang_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tabLang_2" data-toggle="tab" aria-expanded="true">UZ</a></li>
                            <li class=""><a href="#tabLang_3" data-toggle="tab" aria-expanded="true">EN</a></li>
                    </ul>
        <div class="tab-content">

                            <div class="tab-pane active" id="tabLang_1">

                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link_ru')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_ru')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address_ru')->textInput(['maxlength' => true]) ?>


                </div>

                            <div class="tab-pane " id="tabLang_2">

                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address_uz')->textInput(['maxlength' => true]) ?>


                </div>

                <div class="tab-pane " id="tabLang_3">

                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address_en')->textInput(['maxlength' => true]) ?>

                </div>


        </div>
    </div>


    <?php /*= $form->field($model, 'region_id')
        ->dropDownList(
            [
                '1'=>'АНДИЖАНСКАЯ ОБЛАСТЬ',
                '2'=>'БУХАРСКАЯ ОБЛАСТЬ',
                '3'=>'ДЖИЗАКСКАЯ ОБЛАСТЬ',
                '4'=>'РЕСПУБЛИКА КАРАКАЛПАКСТАН',
                '5'=>'КАШКАДАРЬИНСКАЯ ОБЛАСТЬ',
                '6'=>'НАВОИЙСКАЯ ОБЛАСТЬ',
                '7'=>'НАМАНГАНСКАЯ ОБЛАСТЬ',
                '8'=>'САМАРКАНДСКАЯ ОБЛАСТЬ',
                '9'=>'СУРХАНДАРЬИНСКАЯ ОБЛАСТЬ',
                '10'=>'СЫРДАРЬИНСКАЯ ОБЛАСТЬ',
                '11'=>'ТАШКЕНТ И ТАШ. ОБЛАСТЬ',
                '12'=>'ФЕРГАНСКАЯ ОБЛАСТЬ',
                '13'=>'ХОРЕЗМСКАЯ ОБЛАСТЬ',
                '14'=>'РОССИЙСКАЯ ФЕДЕРАЦИЯ',
                '15'=>'РЕСПУБЛИКА КИРГИЗИЯ',
                '16'=>'КАЗАХСТАН',

            ],
            $param = ['options' =>[ $model->region_id => ['selected' => true]]]
        ); */

     echo $form->field($model, "region_id")
        ->dropDownList(
            \yii\helpers\ArrayHelper::map(\common\models\Regions::find()->all(),'id','name_ru')
            , $param = ["options" => [$model->region_id => ["selected" => true]]]);


    ?>

    <div class="form-group">
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="Dillers[tmp_image]" id="img_preview" class="image" accept="image/*">
        </div>
        <img width="266px" id="img_preview" class="thumb" src="<?=$model->isNewRecord  ? '' : '/uploads/dillers/'.$model->id .'/thumb/' . $model->image . '?v=' . rand(1000000,9999999) ?>" alt="">
    </div>

    <div class="form-group">
        <button class="btn btn-success img_file" data-file="diller_sert">Загрузить файл сертификата</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="Dillers[tmp_file_cert]" id="diller_sert" class="file">
        </div>

        <div id="box_diller_sert" class="container-file"  style="display: <?=  @$model->file_cert != '' ? 'block': 'none' ?>">
            <img width="150px" src="/uploads/file.png">
            <div class="btn btn-danger remove-file_cert" data-id="<?=$model->id ?>">Удалить файл</div>
            <?php if($model->file_cert!='' ){ ?>
            <a href="/uploads/dillers/<?=$model->id .'/' . $model->file_cert ?>" class="btn btn-primary" download="">Скачать файл</a>
            <?php } ?>
        </div>
    </div>



    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "status")
        ->dropDownList([
            "0" => "Отключен",
            "1" => "Включен",
        ],
            $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php if( !$model->isNewRecord ){ ?>
        <a href="/admin/dillers-office?diller_id=<?=$model->id ?>" class="btn btn-warning">Офисы</a>
        <a href="/admin/dillers-services?diller_id=<?=$model->id ?>" class="btn btn-warning">Сервисы</a>
        <a href="/admin/dillers" class="btn btn-primary">назад к дилерам</a>
        <?php } ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $script = "$(document).ready(function(){
    
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
	
	$(document).on('change','.file',function(){
	  var input = $(this)[0];
	  var obj = $(this);
	  if ( input.files && input.files[0] ) {
		$('#box_'+$(this).attr('id')).fadeIn();
	  } else console.log('not isset files data or files API not support');  
	});  
    
	$('.img_file').click(function(e){ e.preventDefault(); $('#'+$(this).data('file')).click(); }); 			
	
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });

	 
	$('.remove-file_cert').click(function(e){
		//e.preventDefault();
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');
        if(id==undefined) return false;				
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/dillers/delete-file',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) {
                    obj.fadeOut();
                }
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
	 
	
});";
$this->registerJs($script, yii\web\View::POS_END);