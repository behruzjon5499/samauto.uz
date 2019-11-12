<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}


$columns = $generator->getColumnNames();

$modelClassUC = StringHelper::basename($generator->modelClass);
$modelClass = Inflector::camel2id(StringHelper::basename($generator->modelClass));

//print_r($columns);


function unsetColumn(&$safeAttributes,$name){
    foreach ($safeAttributes as $key=>$v) {
        if($v==$name) {
            unset($safeAttributes[$key]); // удаляем из списка атрибут
        }
    }
}




echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
<?php if($generator->gallery){ ?>
use backend\assets\GalleryAsset;
GalleryAsset::register($this);
<?php } ?>
/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= $modelClass ?>-form">

    <?= "<?php " ?>
	$form = ActiveForm::begin(
        [
            'id' => '<?= $modelClass ?>-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>	

<?php

// список языков для перевода
$langs = explode(',', trim($generator->lang,','));

// список сущ полей
//echo '<pre>';print_r($safeAttributes);  echo '</pre>';

if(count($langs)>1){ // если более 1 языка
?>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <?php
            $n = 0;
            foreach($langs as $lang){ // вкладки
                $n++; ?>
                <li class="<?=$n==1?'active':''?>"><a href="#tabLang_<?=$n ?>" data-toggle="tab" aria-expanded="true"><?=mb_strtoupper($lang)?></a></li>
            <?php } ?>
        </ul>
        <div class="tab-content">

            <?php // блоки вкладок
            $n = 0;
            foreach($langs as $lang) { // языки
                $n++; // след. язык
                ?>
                <div class="tab-pane <?=$n==1?'active':''?>" id="tabLang_<?=$n ?>">

                <?php foreach ($columns as $attribute) {

                    $is_lang = false;

                    if (strpos($attribute, '_') > 0) { // если у поля есть разделитель проверить на язык
                        $attr = explode('_', $attribute);
                        $is_lang = $attr[1] === $lang; // поиск языка
                    }

                    if (in_array($attribute, $safeAttributes) && $is_lang) {
                        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                        unsetColumn($safeAttributes,$attribute);
                    }
                }

            ?>

                </div>

            <?php

            }
            ?>


        </div>
    </div>

<? } // count langs

if(in_array('image',$columns)) { ?>


    <p>Рекомендуемый размер 200 px 300 px </p>
    <button class="btn btn-success img_preview">Загрузить изображение</button>
    <div id="image-preview" style="display:none">
        <input type="file" name="<?=$modelClassUC ?>[tmp_image]" id="img_preview" class="image" accept="image/*">
    </div>

    <img width="266px" id="img_preview" class="thumb" src="<?= '<?=$model->isNewRecord  ? \'\' : \'/uploads/'.$modelClass.'/\'.$model->id .\'/thumb/\' . $model->image . \'?v=\' . rand(1000000,9999999) ?>' ?>" alt="">


<?php
    unsetColumn($safeAttributes,'image');

}


if($generator->gallery){ // галерея изображений ?>

    <div class="btn btn-success img_preview_gallery" data-id="gallery">Загрузить изображения</div>
    <div id="image-preview" style="display:none">
        <input type="file" id="img_preview_gallery" name="<?=$modelClassUC?>[tmp_gallery_images][]"  class="image" accept="image/*" multiple />
    </div>

    <div id="preview_gallery">

        <?php echo '<?php '; ?>

        if( isset($gallery->images) ){
            $i=0;
            foreach( $gallery->images as $gal ){
                $i++;
                ?>
                <span class="pip_old">
							<img class="imageThumb" src="/uploads/<?=$modelClass ?>/<?= '<?=$model->id.' ?>'/gallery/thumb/'.$gal->image.'?v=' . rand(1000000,9999999) ?>"><br>
							<span class="remove-ajax" data-id="<?='<?=$gal->id?>'?>">Удалить</span>
						</span>
        <?php
        echo '<?php }';
        echo '} ?>';
        ?>

    </div>

    <input type="hidden" name="delete_gallery_image" id="delete_gallery_image">


<?php }

foreach ($columns as $key=>$attribute) {
    if (in_array($attribute, $safeAttributes) && $attribute != 'status') {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
}

if(in_array('status',$columns)) {

    echo '<?= $form->field($model, "status")
        ->dropDownList([
            "0" => "Отключен",
            "1" => "Включен",
        ], $param = ["options" => [$model->status => ["selected" => true]]]);
     ?>';
    unsetColumn($safeAttributes,'status');

}
?>
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Создать') ?> : <?= $generator->generateString('Сохранить') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
<?php

echo '<?php $script = "';
echo "$('document').ready(function(){
    
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
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });";


if($generator->gallery){ // если есть галерея

echo "	
    // удаление из фото галереи
	$('.remove-ajax').click(function(){	
		var id = $(this).data('id');		
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/products/delete-image',            
            dataType: 'json',
            data: 'id='+id +'&pid='+pid +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});";
} // gallery

echo '});";';

echo '$this->registerJs($script, yii\web\View::POS_END);';
//echo (int)$generator->gallery;