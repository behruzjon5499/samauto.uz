<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>
<a href="/admin/categories/create" class="btn btn-success">+ Добавить категорию для Запчастей</a>
<div class="categories-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'categories-form',
            //'enableClientValidation' => false,
            //'enableAjaxValidation' => false,
            // 'action' => $model->isNewRecord ? '/admin/news/create' : '/admin/news/update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);?>
    <?php
    /*echo $form->field($model, 'cat_1')
        ->dropDownList(
            ArrayHelper::map(\common\models\Categories::find()->where(['cat_2'=>0])->all(),'id','title')
            , $param = ['options' => [$model->cat_1 => ['selected' => true]]]);
    */ ?>



    <?php

	/* $categories = \common\models\Categories::find()/ *->where(['parent_id'=>0])* /->all(); // только корневые

    $menu = [];

    foreach($categories as $cat) {
        if($cat->parent_id==0){
            $menu[$cat->id] = ['id' => $cat->id, 'name' => $cat->title_ru];
        }else {
            $menu[$cat->parent_id]['submenu'][] = ['id' => $cat->id, 'name' => $cat->title_ru];
        }
    } ?>

    <label>Категория</label>

    <select name="Categories[parent_id]" class="form-control" id="select-category" style="white-space:pre;">
        <option value="0" data-item="main" <?=$model->parent_id == 0 ? 'selected' : '' ?>>Корневая</option>
        <?php
        $old_item = '';
        foreach($menu as $item ) { ?>
            <?php
            if (isset($item['submenu'])) { ?>
                <optgroup label="<?= $item['name']?>">
                    <option value="<?= $item['id'] ?>"
                            data-item="main" <?= $model->parent_id == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
                    <?php foreach ($item['submenu'] as $subitem) { ?>
                        <option value="<?= $subitem['id'] ?>"
                                data-item="sub" <?= $model->parent_id == $subitem['id'] ? 'selected' : '' ?>><?= ' • ' . $subitem['name'] ?></option>
                    <?php } // foreach ?>
                </optgroup>
            <?php } else { ?>
                <option value="<?= $item['id'] ?>"
                        data-item="main" <?= $model->parent_id == $item['id'] ? 'selected' : '' ?>><?= $item['name'] ?></option>
            <?php }
        } ?>
    </select>

    <?php */

    $categories = \common\models\CategoriesParts::find()->orderBy('parent_id DESC')->all(); // where(['parent_id'=>0])->all(); // только корневые

    //echo $model->cat_id; exit;
    ?>
    <label>Категории</label>
    <select class="form-control" name="Categories[parent_id]" id="select-category">
        <option value="0" data-item="main" <?=$model->id == 0 ? 'selected' : '' ?>>Корневая</option>
        <?=\common\helpers\ListHelper::getSelectListFull($categories, ['active_id'=>$model->id])?>

    </select>
    <br>

    <br>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'link_ru')->textInput(['maxlength' => true]) ?>
                <small>Поле Ссылка генерируется автоматически из поля Название, если поле Ссылка пустое</small>
            </div>
            <div class="tab-pane" id="tab_2">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'link_uz')->textInput(['maxlength' => true]) ?>
                <small>Поле Ссылка генерируется автоматически из поля Название, если поле Ссылка пустое</small>
            </div>
            <div class="tab-pane" id="tab_3">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'link_en')->textInput(['maxlength' => true]) ?>
                <small>Поле Ссылка генерируется автоматически из поля Название, если поле Ссылка пустое</small>
            </div>
        </div>
    </div>

    <br><br>

    <input type="hidden" name="Categories[type]" value="0">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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

    $('#select-category').change(function(e){ 
        e.preventDefault();	
        if( $(this).data('item') == '' ) {
            
        }else{
            
        } 
    });
    
    $('form#w0').submit(function(){        
        
        if( $('#select-category option:selected').data('item') == 'sub' ) {
            alert('Категории можно добавлять только в родительские!');
            return false;
        }
        
        
    });
    
    
});";
$this->registerJs($script, yii\web\View::POS_END);


