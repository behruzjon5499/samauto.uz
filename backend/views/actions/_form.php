<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Actions */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="actions-form">

    <?php $form = ActiveForm::begin(
        [
            'id' => 'actions-form',
				//'enableClientValidation' => false,
				//'enableAjaxValidation' => false,
				// 'action' => $model->isNewRecord ? '/admin/' : '/admin/.../update?id=' . $model->id ,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]);
    ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabLang_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                            <li class=""><a href="#tabLang_2" data-toggle="tab" aria-expanded="true">UZ</a></li>
                            <li class=""><a href="#tabLang_3" data-toggle="tab" aria-expanded="true">EN</a></li>
                    </ul>
        <div class="tab-content">

                            <div class="tab-pane active" id="tabLang_1">

                    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_ru')->textarea(['rows' => 6]) ?>


                </div>

                            <div class="tab-pane " id="tabLang_2">

                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_uz')->textarea(['rows' => 6]) ?>


                </div>

                            <div class="tab-pane " id="tabLang_3">

                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_en')->textarea(['rows' => 6]) ?>


                </div>

            

        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="Actions[tmp_image]" id="img_preview" class="image" accept="image/*">
        </div>

        <img width="250px" id="img_preview" class="thumb" src="<?=$model->isNewRecord  ? '' : '/uploads/actions/'.$model->id .'/' . $model->image . '?v=' . rand(1000000,9999999) ?>" alt="">
    </div>


    <?php


    echo '<label>Дата начала</label>';
    echo DatePicker::widget([
        'name' => 'Actions[date_start]',
        'value' => date('d-m-Y', $model->isNewRecord ? time() : $model->date_start),
        'options' => ['placeholder' => 'Дата начала' ],
        'pluginOptions' => [
            'language' => 'ru',
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>
    <?php


    echo '<label>Дата завершения</label>';
    echo DatePicker::widget([
        'name' => 'Actions[date_end]',
        'value' => date('d-m-Y', $model->isNewRecord ? time() : $model->date_end ),
        'options' => ['placeholder' => 'Дата окончания' ],
        'pluginOptions' => [
            'language' => 'ru',
            'format' => 'dd-mm-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "status")
        ->dropDownList([
            "0" => "Отключен",
            "1" => "Включен",
        ],
            $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
	$('.img_preview').click(function(e){ e.preventDefault(); 
	$('#img_preview.image').click(); });
});";
$this->registerJs($script, yii\web\View::POS_END);