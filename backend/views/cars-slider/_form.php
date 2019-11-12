<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CarsSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-slider-form">

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


    $categories = \common\models\CategoriesCars::find()->orderBy('parent_id DESC')->all(); // where(['parent_id'=>0])->all(); // только корневые

    ?>
    <label>Категории</label>
    <select class="form-control" name="CarsSlider[category_id]" id="select-category">
       <?php /*  <option value="0" data-item="main" <?=$model->category_id == 0 ? 'selected' : '' ?>>Корневая</option> */ ?>
        <?=\common\helpers\ListHelper::getSelectListFull($categories, ['active_id'=>$model->category_id])?>

    </select>
    <br>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab2_1" data-toggle="tab" aria-expanded="true">RU</a></li>
            <li class=""><a href="#tab2_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
            <li class=""><a href="#tab2_3" data-toggle="tab" aria-expanded="false">EN</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab2_1">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'text_ru')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane" id="tab2_2">
                <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'text_uz')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="tab-pane" id="tab2_3">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'text_en')->textarea(['maxlength' => true]) ?>
            </div>

        </div>
    </div>


    <div class="block">

        <?= $form->field($model, 'frames')->textInput(['maxlength' => true]) ?>

        <button class="btn btn-success img_preview">Загрузить изображение спрайта</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="CarsSlider[tmp_image]" id="img_preview" class="image"
                   accept="image/*">
        </div>

        <img width="500px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/cars-slider/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">

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
	

});";
$this->registerJs($script, yii\web\View::POS_END);
