<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'required' => true])->label('Имя пользователя') ?>
    <?= $form->field($model, 'role')
        ->dropDownList(['9'=>'Админ' /*, '5'=>'Менеджер'*/] ,
            $param = ['options' => [$model->status => ['Selected' => true]]]
        );
    ?>
    <?= $form->field($model, 'email')->textInput(['type'=>'email','maxlength' => true, 'required' => true ]) ?>
    <?php //= $form->field($model, 'settings')->textarea(['rows' => 6]) ?>

    <?php if($model->isNewRecord){
        echo $form->field($model, 'password')->textInput(['maxlength' => true, 'required' => true]) ;
    }else {
        echo $form->field($model, 'password')->textInput(['maxlength' => true]);
    } ?>


    <?= $form->field($model, "status")
        ->dropDownList([
            "0" => "Отключен",
            "1" => "Включен",
        ],
            $param = ['options' => [$model->isNewRecord ? 1 : $model->status => ['Selected' => true]]]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>


<?php

$script = "
$(document).ready(function(){
    
    $('#user-role').change(function(e){        
        if( $(this).val() == 9 ){
            $('#manager-accept').fadeOut();            
        }else{
           $('#manager-accept').fadeIn();
        }
        
    });
});
";
$this->registerJs($script, yii\web\View::POS_END);

