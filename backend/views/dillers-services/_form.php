<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\DillersServices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dillers-services-form">

    <?php 	$form = ActiveForm::begin(
        [
            'id' => 'dillers-services-form',
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

                    <?= $form->field($model, 'username_ru')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'doljnost_ru')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_ru')->textInput(['maxlength' => true]) ?>


                </div>

                <div class="tab-pane " id="tabLang_2">

                    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'username_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'doljnost_uz')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_uz')->textInput(['maxlength' => true]) ?>


                </div>

                <div class="tab-pane " id="tabLang_3">

                    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'username_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'doljnost_en')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'text_en')->textInput(['maxlength' => true]) ?>

                </div>

            

        </div>
    </div>

    <div class="form-group">
        <p>Минимальный рекомендуемый размер 500 х 300 px</p>
        <button class="btn btn-success img_preview">Загрузить изображение</button>
        <div id="image-preview" style="display:none">
            <input type="file" name="DillersServices[tmp_image]" id="img_preview" class="image" accept="image/*">
        </div>
        <img width="400px" id="img_preview" class="thumb" src="<?=$model->isNewRecord  ? '' : '/uploads/dillers/'.$model->diller_id .'/' . $model->image . '?v=' . rand(1000000,9999999) ?>" alt="">
    </div>

    <?= $form->field($model, "office_id")
        ->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\DillersOffice::find()->where(['diller_id'=>$diller_id])->all(),'id','title_ru')
        , $param = ["options" => [$model->office_id => ["selected" => true]]]);
    ?>


    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phones')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>

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
        <a href="/admin/dillers-office?diller_id=<?=$diller_id ?>" class="btn btn-primary">Назад к офисам</a>
        <a href="/admin/dillers" class="btn btn-primary">Назад к дилерам</a>

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
	$('.img_preview').click(function(e){ e.preventDefault(); $('#img_preview.image').click(); });});";$this->registerJs($script, yii\web\View::POS_END);