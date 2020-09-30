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

if($worker) { ?>

    <style>
        .sidebar-menu-item a:hover{
            cursor: pointer;
        }

    </style>

        <div class="min768"></div>

        <div class="site_modal askQuest ask_a_question">
            <div class="overlayClose"></div>
            <div class="flex_row_cen_cen">
                <div class="wrap">
                    <div class="closeBtn"><span></span><span></span></div>
                    <div class="title"><?=LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></div>
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
                                <label for=""><?=LangHelper::t("ФИО", "TO'LIQ ISM", "FULL NAME"); ?></label>
                                <?=$form->field($model_question,'username')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("КОНТАКТНЫЙ ТЕЛЕФОН", "ALOQA TELEFON RAQAMI", "CONTACT PHONE"); ?></label>
                                <?=$form->field($model_question,'phone')->textInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ОРГАНИЗАЦИЯ", "TASHKILOT", "ORGANIZATION"); ?></label>
                                <?=$form->field($model_question,'company')->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ЭЛЕКТРОННАЯ ПОЧТА", "ELEKTRON POCH", "EMAIL"); ?></label>
                                <?=$form->field($model_question,'email')->textInput()->label(false) ?>
                            </div>
                        </div>
                    </div>
                    <div class="_row">
                        <div class="col-6">
                            <div class="inf">
                                <label for=""><?=LangHelper::t("ТЕМА ОБСУЖДЕНИЯ", "MUHOKAMA MAVZUSI", "DISCUSSION TOPIC"); ?></label>
                                <?=$form->field( $model_question,'subject' )->textInput()->label(false) ?>
                            </div>
                            <div class="inf">
                                <?php /*<label for=""><?=LangHelper::t("ВВЕДИТЕ КОД С КАРТИНКИ", "RASMDAGI KODNI KIRITING", "ENTER THE CODE FROM THE IMAGE"); ?></label>*/ ?>
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
                            <button type="submit" class="ButtonBox js_internal-link">
                                <span class="ButtonBox-text"><?=LangHelper::t("ОТПРАВИТЬ", "YUBORISH", "SEND"); ?></span>
                                <span class="ButtonBox-icon">
                                    <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" value="0" name="Questions[user_id]" id="add_question">
                    <?php \yii\widgets\ActiveForm::end() ?>
                </div>
            </div>
        </div>

        <div class="section-gap leaders_page">
            <div class="very_small_container">
                <div class="mTitle"><?=LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARUVI", "COMPANY MANAGEMENT"); ?></div>
                <div class="leaders_page--wrap">
                    <ul class="leaders_page--ul">

                            <?php /*
                            <a href="#" class="active">Генеральный директор</a>
                            <ul>
                                <li><a href="#">Заместитель директора 1</a></li>
                                <li><a href="#">Заместитель директора 2</a></li>
                                <li>
                                    <a href="#">Заместитель директора 3</a>
                                    <ul>
                                        <li><a href="#">Секретарь генерального директора</a></li>
                                    </ul>
                                </li>
                            </ul> */ ?>

                            <?php
                            $leaderships = \common\models\CompanyUsers::find()->all();
                            echo \common\helpers\ListHelper::getListEx($leaderships,['field'=>'doljnost_'.$lang,'active_id'=>@$worker->id,'parent_id'=>0]);
                            ?>

                        <?php /*</li>
                        <li>
                            <a href="#">Исполнительный директор</a>
                             <ul>
                                 <li><a href="#">Начальник юридического отдела</a></li>
                                 <li><a href="#">Юрист</a></li>
                             </ul>
                        </li>
                        <li>
                            <a href="#">Финансовый директор</a>
                        </li> */ ?>
                    </ul>
                    <div class="ajax-leader-wrap">
                        <div class="item big_item">
                            <div class="top">
                                <img src="/uploads/company-users/<?=$worker->id . '/'. $worker->image ?>" alt="">
                            </div>
                            <div class="bottom">
                                <div class="names">
                                    <div class="name"><?=$worker->$name ?></div>
                                    <div class="position"><?=$worker->$doljnost ?></div>
                                </div>
                                <?php if($worker->$days!=''){ ?>
                                    <div class="days">
                                        <div class="bold"><?=LangHelper::t("ДНИ ПРИЁМА", "QABUL KUNLARI", "DAYS OF RECEPTION"); ?>:</div>
                                        <span><?=$worker->$days ?></span>
                                    </div>
                                <?php } ?>
                                <div class="contacts">
                                    <div class="bold"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?>:</div>
                                    <a href="#" class="phone"><?=$worker->phone ?></a>
                                    <a href="#"><?=$worker->email ?></a>
                                    <a href="#"><?=$worker->site ?></a>
                                </div>
                                <a href="#" class="ButtonBox js_internal-link _ask_btn"  data-id="<?=$worker->id ?>">
                                    <span class="ButtonBox-text"><?=LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></span>
                                    <span class="ButtonBox-icon">
                                        <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php } ?>

<div>

<div class="site_bread">
	<div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <span><?=LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARUVI", "COMPANY MANAGEMENT"); ?></span>
	</div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php

if( !$info = Yii::$app->session->getFlash('info') ){
    $info  = '';
}

$server_error =LangHelper::t("Ошибка сервера!", "Serverda xatolik!", "Server error!");

$script = "
$(document).ready(function() {
    var info = '{$info}';
    
    $('body').on('click', '._ask_btn', function(e){
        e.preventDefault();
        $('#add_question').val($(this).data('id'));
        $('.ask_a_question').fadeIn().addClass('shoow');
        return false;
    }); 
    
    $('.sidebar-menu-item a').click(function(e){
        e.preventDefault();
        $('.sidebar-menu-item a').removeClass('active');
        $(this).addClass('active');    
        
        id = $(this).data('id'); 
        
        $.ajax({
            type: 'post',
            url: '/get-workers',
            data: 'id='+id+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.status==1) $('.ajax-leader-wrap').html(data.html);
                
                //alert(data.html)
                 
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
        });  
        
    })
    
});";
$this->registerJs($script, yii\web\View::POS_END);
