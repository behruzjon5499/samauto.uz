<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 05.12.2018
 * Time: 10:10
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Загрузка файла с каталогом';


    $form = ActiveForm::begin(
    [
    'id' => 'files-form',
    //'enableClientValidation' => false,
    //'enableAjaxValidation' => false,
    'options' => [
    // 'class' => 'form-horizontal',
    'enctype' => 'multipart/form-data',
    ]

    ]);?>

<div class="alert alert-info">
    <p>Максимальный размер загружаемого файла 15 Мбайт</p>
</div>



<div class="">
    <div>Загрузить файл</div>

    <button class="btn btn-success img_file" data-file="catalog">Загрузить файл</button>
    <div id="image-preview" style="display:none">
        <input type="file" name="Pages[tmp_file_catalog]" id="catalog" class="file">
    </div>

    <div id="box_catalog" class="container-file"  style="display: <?=  @$data['file_catalog'] != '' ? 'block': 'none' ?>">
        <img width="150px" src="/uploads/file.png">
        <button class="btn btn-danger remove-file" data-id="2">Удалить файл</button>
    </div>



</div>

<br>

    <input type="hidden" name="MAX_FILE_SIZE" value="15728640" />

    <input type="hidden" name="Pages[page]" value="files">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php $script = "$('document').ready(function(){

    var href = '{$_SERVER['REQUEST_URI']}';
    
    $(document).on('change','.file',function(){
	  var input = $(this)[0];
	  var obj = $(this);
	  if ( input.files && input.files[0] ) {
		$('#box_'+$(this).attr('id')).fadeIn();
	  } else console.log('not isset files data or files API not support');  
	});  
    
	$('.img_file').click(function(e){ e.preventDefault(); $('#'+$(this).data('file')).click(); });	
    
	$('.remove-file').click(function(e){
		e.preventDefault();
		if(!confirm('Подтвердите удаление')) return false;
		var id = $(this).data('id');		
		obj = $(this).parent();
		$.ajax({
			type: 'post',
            url: '/admin/pages/delete-file',            
            dataType: 'json',
            data: 'id='+id+'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status) {
                    obj.fadeOut();
                    //window.location.href = href;
                }
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});
});";
$this->registerJs($script, yii\web\View::POS_END);