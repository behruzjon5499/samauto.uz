<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.10.2018
 * Time: 17:00
 */

use yii\captcha\Captcha;
use common\helpers\LangHelper;

use frontend\assets\LeadersAsset;
\frontend\assets\AboutAsset::register($this);
LeadersAsset::register($this);

$title = 'title_' . $lang;
$name = 'name_' . $lang;
$text = 'text_' . $lang;
$days = 'days_' . $lang;
$doljnost = 'doljnost_' . $lang;

$_title =LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARUVI", "COMPANY MANAGEMENT");
$this->title = $_title;

if($workers) { ?>

        <div class="min768"></div>

        <div class="site_modal askQuest ask_a_question">
            <div class="overlayClose"></div>
            <div class="flex_row_cen_cen">
                <div class="wrap">
                    <div class="closeBtn"><span></span><span></span></div>
                    <div class="title"><?=Yii::t('app','Задать вопрос') ?> </div>
                    <?php $form = \yii\widgets\ActiveForm::begin(['action'=>'/site/send-question','method'=>'post']);
                        /*
                         *  2 капчи не работаю одновременно на 2-х формах
                         * $captcha = $form->field($model_question, 'verifyCode')->widget(Captcha::className(), [
                            'captchaAction' => '/site/captcha',
                            'template' => '<div class="captcha">{image}</div><div class="column-2 col-xs-4">{input}</div>',
                            'options' => [
                                'class' => 'standart',
                                'placeholder' => Yii::t('app','Введите символы с картинки'),
                            ],
                            'imageOptions' => [
                                'height'=> 50,
                            ],
                        ])->label(false); */
                    ?>
                    <div class="_row">
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=Yii::t('app','Ф.И.О') ?></label>
                                <?=$form->field($model_question,'username')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=Yii::t('app','КОНТАКТНЫЙ ТЕЛЕФОН') ?></label>
                                <?=$form->field($model_question,'phone')->textInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=Yii::t('app','ОРГАНИЗАЦИЯ')?></label>
                                <?=$form->field($model_question,'company')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=Yii::t('app','ЭЛЕКТРОННАЯ ПОЧТА')?></label>
                                <?=$form->field($model_question,'email')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>
                    <div class="_row">
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=Yii::t('app','ТЕМА ОБСУЖДЕНИЯ') ?></label>
                                <?=$form->field($model_question,'subject')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <?php /*<label for=""><?=Yii::t('app','ВВЕДИТЕ КОД С КАРТИНКИ') ?></label>*/ ?>
                                <?php /*
                                <div class="captcha">
                                    <?=$captcha ?>
                                </div>  */ ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ВОПРОС", "SAVOL", "QUESTION"); ?></label>
                                <?=$form->field($model_question,'text')->textarea()->label(false) ?>
                            </div>
                            <button type="submit" class="redBtn"><span><?=Yii::t('app','ОТПРАВИТЬ')?></span></button>
                        </div>
                    </div>
                    <input type="hidden" value="0" name="Questions[user_id]" id="add_question">
                    <?php \yii\widgets\ActiveForm::end() ?>
                </div>
            </div>
        </div>
        <div class="site_modal askQuest ask_all_question">
            <div class="overlayClose"></div>
            <div class="flex_row_cen_cen">
                <div class="wrap">
                    <div class="closeBtn"><span></span><span></span>
                    </div>
                    <div class="title"><?=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); ?></div>
                    <?php $form = \yii\widgets\ActiveForm::begin(['action'=>'/site/send-reception','method'=>'post']); ?>
                    <div class="_row">
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ФИО", "TO'LIQ ISM", "Full name"); ?></label>
                                <?=$form->field($model_reception,'username')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ОРГАНИЗАЦИЯ", "TASHKILOT", "ORGANIZATION"); ?></label>
                                <?=$form->field($model_reception,'company')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("КОНТАКТНЫЙ ТЕЛЕФОН", "ALOQA TELEFON RAQAMI", "CONTACT PHONE"); ?></label>
                                <?=$form->field($model_reception,'phone')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ЭЛЕКТРОННАЯ ПОЧТА", "ELEKTRON POCH", "EMAIL"); ?></label>
                                <?=$form->field($model_reception,'email')->textInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ТЕМА ОБСУЖДЕНИЯ", "MUHOKAMA MAVZUSI", "DISCUSSION TOPIC"); ?></label>
                                <?=$form->field($model_reception,'subject')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ДОПОЛНИТЕЛЬНЫЙ КОММЕНТАРИЙ", "FIKRLAR", "COMMENT"); ?></label>
                                <?=$form->field($model_reception,'text')->textarea()->label(false) ?>
                            </div>
                            <button type="submit" class="redBtn"><span><?=LangHelper::t("ОТПРАВИТЬ", "YUBORISH", "SEND"); ?></span></button>
                        </div>
                    </div>

                    <input type="hidden" value="0" name="Receptions[user_id]" id="add_reception">
                    <?php \yii\widgets\ActiveForm::end() ?>
                </div>
            </div>
        </div>

        <!--<div class="ask_all_btn">
            <img src="/images/askQuest.png" alt=""> <span><?/*=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); */?></span>
        </div>-->

        <div class="leadership_page section-gap">
            <div class="levelOne">
                <div class="leaders">
                    <?php

                    foreach ($workers as $leader) { ?>

                    <div class="item big_item have_a_child" data-id="<?=count($leader->workers)>0 ? $leader->id : 0 ?>">
                        <a href="#" class="top">
                            <img src="/uploads/company-users/<?=$leader->id . '/' . $leader->image ?>" alt="">
                            <span class="_ask_btn" data-id="<?=$leader->id ?>"><?=LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></span>
                        </a>
                        <div class="bottom">
                            <div class="names">
                                <div class="name"><?=$leader->$name ?></div>
                                <div class="position"><?=$leader->$doljnost ?></div>
                            </div>
                            <div class="days">
                                <div class="bold"><?=LangHelper::t("ДНИ ПРИЁМА", "QABUL KUNLARI", "DAYS OF RECEPTION"); ?>:</div>
                                <?=nl2br($leader->$days) ?>
                            </div>
                            <div class="contacts">
                                <div class="bold"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?>:</div>
                                <a href="#" class="phone"><?=$leader->phone ?></a>
                                <a href="#"><?=$leader->email ?></a>
                                <a href="#"><?=$leader->site ?></a>
                            </div>
                            <button class="redBtn _ask_all_btn" data-id="<?=$leader->id ?>"><span><?=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); ?></span></button>
                        </div>
                    </div>

                    <?php } ?>

                </div>

                <div class="workers"></div>

            </div>
        </div>


<?php } ?>

<div class="site_bread">
	<div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <span><?=LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARUVI", "COMPANY MANAGEMENT"); ?></span>
	</div>
</div>

<?php

if( !$info = Yii::$app->session->getFlash('info') ){
    $info  = '';
}

$script = "
$(document).ready(function() {
    var info = '{$info}';
    
    $('body').on('click', '._ask_btn', function(e){
        e.preventDefault();
        $('#add_question').val($(this).data('id'));
        $('.ask_a_question').fadeIn().addClass('shoow');
        return false;
    });
    
    $('body').on('click', '._ask_all_btn', function(e){
        e.preventDefault();
        $('#add_reception').val($(this).data('id'));
        $('.ask_all_question').fadeIn().addClass('shoow');
        return false;
    });
    
});";
$this->registerJs($script, yii\web\View::POS_END);
