<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$title = 'title_'.$lang;
$this->title = $information->$title;

$text = 'text_'.$lang;
$noImage = 'employee.jpg';

?>
<div class="kareer-form site_modal askQuest ask_a_question" >
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen kareer">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span></div>

            <?php $form = \yii\widgets\ActiveForm::begin([]); ?>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'fullname')->textInput() ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'message')->textarea()->label('Что Вы Хотите Узнать?') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'phone')->textInput(['type' => 'tel'])->label('Контактный номер телефона') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email'])->label('E-mail') ?>
                </div>
            </div>

            <div class="graduate-form-btn">
                <button type="submit" class="ButtonBox js_internal-link">
                    <span class="ButtonBox-text">ОТПРАВИТЬ</span>
                    <span class="ButtonBox-icon">
                            <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                        </span>
                </button>
            </div>

            <?php \yii\widgets\ActiveForm::end();?>
        </div>
    </div>
</div>

<div class="kareer-graduate about_page section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $information->$title?></div>
        <div class="boxes" style="flex-wrap: wrap" data-aos="fade-up" data-aos-delay="200">

            <div class="graduate-next">
                <?= $information->$text?>

                <br>
                <br>
                <div class="buttons-graduate">
                    <div class="buttons-graduate-each">
                        <a href="/career/vacancies" class="ButtonBox js_internal-link"  data-id="3">
                            <span class="ButtonBox-text">Вакансии</span>
                        </a>
                    </div>
                    <div class="buttons-graduate-each">
                        <a href="#" class="ButtonBox js_internal-link _ask_btn"  data-id="3">
                            <span class="ButtonBox-text">Задать вопрос</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="site_bread">
    <div class="centerBox">
        <a href="https://samauto.uz/"><?= LangHelper::t('ГЛАВНАЯ', 'BOSH SAHIFA', 'HOME' )?></a>
        <span><?= $this->title?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php /** @var \yii\web\View $this */
$js = <<<JS
 $('body').on('click', '._ask_btn', function(e){
        e.preventDefault();
        $('#add_question').val($(this).data('id'));
        $('.ask_a_question').fadeIn().addClass('shoow');
        return false;
    }); 
JS;

$this->registerJs($js);
?>
