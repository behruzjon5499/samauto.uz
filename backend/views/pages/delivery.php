<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.08.2017
 * Time: 17:01
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Доставка';

?>

    <style>

    </style>

<?php

    $form = ActiveForm::begin(
    [
        'id' => 'page-form',
        //'enableClientValidation' => false,
        //'enableAjaxValidation' => false,
        'options' => [
            // 'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
        ]
    ]);?>

    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Доставка</a></li>
                <?php /* <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Галерея</a></li> */ ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <p>Информация о доставке отображается в корзине</p>
                    <label>Стоимость доставки</label>
                    <input  class="form-control" type="text" name="info[price]" value="<?=@$data['price']?>">


                </div>

            </div>
        </div>


    </div>


    <input type="hidden" name="Pages[page]" value="delivery">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success' ]) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php
$script = " 
$('document').ready(function(){

	
});";
$this->registerJs($script, yii\web\View::POS_END);

