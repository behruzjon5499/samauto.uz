<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\backend\assets\EditorAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">


    <div class="form-group">
        <a href="/admin/vacancy/create" class="btn btn-success">Добавить вакансию</a>
        <a href="/admin/vacancy-category/create" class="btn btn-success">Добавить категорию</a>
        <a href="/admin/vacancy-category" class="btn btn-success">Все категории</a>
    </div>


    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'vacancy-form',
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

    <?= $form->field($model, 'text_ru')->textarea(['rows' => 14]) ?>


                </div>

                            <div class="tab-pane " id="tabLang_2">

                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_uz')->textarea(['rows' => 14]) ?>


                </div>

                            <div class="tab-pane " id="tabLang_3">

                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_en')->textarea(['rows' => 14]) ?>


                </div>

            

        </div>
    </div>

    <?= $form->field($model, "category_id")
        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\VacancyCategory::find()->where(['status'=>1])->all(),'id','title_ru'), $param = ["options" => [$model->category_id => ["selected" => true]]]);
    ?>

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
    </div>

    <?php ActiveForm::end(); ?>

</div>
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
	$('.img_preview').click(function(e){ 
        e.preventDefault(); 
        $('#img_preview.image').click(); 
	});
	$('#vacancy-text_ru').wysihtml5();
	$('#vacancy-text_uz').wysihtml5();
	$('#vacancy-text_en').wysihtml5();
	
});";$this->registerJs($script, yii\web\View::POS_END);