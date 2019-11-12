<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\NewsGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-gallery-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'news-gallery-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>


    <div class="form-group">
        <?= $form->field($model, 'type')
            ->dropDownList(['Изображение', 'Ссылка на видео'],
                $param = ['options' => [$model->type => ['Selected' => true]]]
            ); ?>
    </div>

    <div id="load-image-block">

        <p>Рекомендуемый размер 650 px 350 px</p>
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="NewsGallery[tmp_image]" id="img_preview" class="image"
                   accept="image/*">
        </div>

        <img width="100px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/news-gallery/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">

    </div>

    <div id="load-file-block" style="display: none">

        <p>Ссылка на видео youtube</p>
        <input type="text" name="video-url" class="form-control" value="<?=$model->type==1 ? $model->image : '' ?>">
        <br>

    </div>

    <input type="hidden" name="news_id" value="<?=$model->news_id ?>">

    <?php // = $form->field($model, 'news_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Создать') : Yii::t('app', 'Сохранить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php

        if(!$model->isNewRecord){ ?>
            <a href="/admin/news/update?id=<?=$model->news_id ?>" class="btn btn-primary">Назад</a>
        <?php } ?>


    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>


</script>


<?php $script = "$('document').ready(function(){
    
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
	 	 
	 $('#newsgallery-type').change(function(){
	    console.log( $(this).val() );
        if($(this).val()==1){
            $('#load-image-block').fadeOut();
            $('#load-file-block').fadeIn();
        }else{
            $('#load-file-block').fadeOut();            
            $('#load-image-block').fadeIn();
        }
    });
    
    $('#newsgallery-type').change();
	
});";$this->registerJs($script, yii\web\View::POS_END);