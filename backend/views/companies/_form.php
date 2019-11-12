<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <style>
        .thumb-info {
            width: 150px;
        }

        .imageThumb {
            max-height: 100px;
            border: 1px solid #aaa;
            padding: 5px;
            cursor: pointer;
        }

        .pip,
        .pip_old {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove,
        .remove-ajax {
            display: block;
            background: red;
            border: 1px solid #aaa;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover,
        .remove-ajax:hover {
            background: #cc2406;
        }

        .colors {
            float: left;
        }

        .color {
            width: 40px;
            height: 20px;
            float: left;
            margin: 0px 7px;
            cursor: pointer;
            border: 1px solid #ccc;
        }
    </style>

    <?php /*= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) */ ?>


    <?php $form = ActiveForm::begin(
        [
            'id' => 'companies-form',
            //'enableClientValidation' => false,
            //'enableAjaxValidation' => false,
            'options' => [
                //'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ]
        ]); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Общие</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Фото</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab2_1" data-toggle="tab" aria-expanded="true">RU</a></li>
                        <li class=""><a href="#tab2_2" data-toggle="tab" aria-expanded="false">UZ</a></li>
                        <li class=""><a href="#tab2_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab2_1">
                            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'doljnost_ru')->textInput(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'text_ru')->textarea(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'address_ru')->textarea(['maxlength' => true]) ?>
                            <?= $form->field($model, 'days_ru')->textarea(['maxlength' => true]) ?>
                        </div>
                        <div class="tab-pane" id="tab2_2">
                            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'doljnost_uz')->textInput(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'text_uz')->textarea(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'address_uz')->textarea(['maxlength' => true]) ?>
                            <?= $form->field($model, 'days_uz')->textarea(['maxlength' => true]) ?>
                        </div>
                        <div class="tab-pane" id="tab2_3">
                            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'doljnost_en')->textInput(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'text_en')->textarea(['maxlength' => true]) ?>
                            <?php //= $form->field($model, 'address_en')->textarea(['maxlength' => true]) ?>
                            <?= $form->field($model, 'days_en')->textarea(['maxlength' => true]) ?>
                        </div>

                    </div>
                </div>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true,'type'=>'email']) ?>

                <?php
                /*
                echo $form->field($model, 'region_id')
                    ->dropDownList(
                        ArrayHelper::map(\common\models\Regions::find()->all(), 'id', 'name_ru')
                        , $param = ['options' => [$model->region_id => ['selected' => true]]]);
                ?>
                <?php /*
                echo $form->field($model, 'city_id')
                    ->dropDownList(
                        ArrayHelper::map(\common\models\Cities::find()->where(['region_id'=>$model->region_id])->all(), 'id', 'name_ru')
                        , $param = ['options' => [$model->city_id => ['selected' => true]]]);
                * / ?>
                <div class="row">

                    <div class="col-md-6">
                        <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>
                    </div>
                </div> */ ?>
            </div>

            <div class="tab-pane" id="tab_3">

                <p>Рекомендуемый размер 200 px 200 px</p>
                <button class="btn btn-success img_preview">Загрузить изображение</button>
                <div id="image-preview" style="display:none">
                    <input type="file" name="Companies[tmp_image]" id="img_preview" class="image"
                           accept="image/*">
                </div>

                <img width="100px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/companies/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">

            </div>

        </div>
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
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
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