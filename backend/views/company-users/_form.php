<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyUsers */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="company-users-form">

    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin(
        [
            'id' => 'companies_user-form',
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
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Фото</a></li>
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

                            <?= $form->field($model, 'doljnost_ru')->textInput(['maxlength' => 255]) ?>
                            <?= $form->field($model, 'days_ru')->textarea(['maxlength' => true]) ?>

                        </div>
                        <div class="tab-pane" id="tab2_2">
                            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'doljnost_uz')->textInput(['maxlength' => 255]) ?>
                            <?= $form->field($model, 'days_uz')->textarea(['maxlength' => true]) ?>

                        </div>
                        <div class="tab-pane" id="tab2_3">
                            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'doljnost_en')->textInput(['maxlength' => 255]) ?>
                            <?= $form->field($model, 'days_en')->textarea(['maxlength' => true]) ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">

                <p>Рекомендуемый размер 200 px 200 px</p>
                <button class="btn btn-success img_preview">Загрузить изображение</button>
                <div id="image-preview" style="display:none">
                    <input type="file" name="CompanyUsers[tmp_image]" id="img_preview" class="image" accept="image/*">
                </div>

                <img width="100px" id="img_preview" class="thumb" src="<?= $model->isNewRecord ? '' : '/uploads/company-users/' . $model->id . '/thumb/' . $model->image . '?v=' . rand(1000000, 9999999) ?>" alt="">

            </div>
        </div>
    </div>

    <input type="hidden" id="companyusers-type" class="form-control" name="CompanyUsers[type]" maxlength="255" aria-invalid="false" value="1">


    <?php /*
        echo $form->field( $model, 'type' )
        ->dropDownList(['Сотрудник', 'Руководитель'],
            $param = ['options' => [$model->type => ['selected' => true]]]
        );

    ?>

    */ ?>

    <?php

    $_company_users = [];
    $_company_users[0] = 'Нет';


    // сотрудники
    $company_users = \common\models\CompanyUsers::find()->where(['status'=>1])->orderBy('type DESC')->all();
    foreach($company_users as $cu){
        if($model->id==$cu->id) continue;
        $_company_users[$cu->id] = $cu->name_ru . ' (' . $cu->doljnost_ru . ')';
    }

    // echo '<pre>'; print_r($company_users);echo '</pre>';

    echo $form->field( $model, 'parent_id' )
        ->dropDownList(
            $_company_users,
            $param = ['options' => [$model->parent_id => ['selected' => true]]]
        );

    ?>

    <?= $form->field($model, 'phone')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php /* = $form->field($model, 'contacts')->textarea(['maxlength' => true]) */ ?>
    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

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


