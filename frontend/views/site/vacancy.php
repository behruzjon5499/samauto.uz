<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.11.2018
 * Time: 14:18
 */

use common\models\Pages;
use common\helpers\LangHelper;

if($page = Pages::find()->where(['page'=>'contacts'])->one() ){
   $page = json_decode($page->data,true);
}
$title = 'title_'.$lang;
$this->title = $category;
?>

<?php if($vacancies) { ?>

<div class="site_modal modalVacansy">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span>
            </div>
            <h2 style="text-transform:uppercase;margin-bottom:20px"></h2>
            <div class="scrollYY">
                <div class="richtextbox modal-vacancy-text">

                </div>
                <div class="flex_row contactBox">
                    <div class="contacts-info">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.9662mm" height="1.9662mm" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"
                             viewBox="0 0 3.3 3.3" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g>
                                <metadata></metadata>
                                <path d="M1.43 1.5l0.15 -0.23c0,0 -0.13,-0.13 -0.18,-0.18 -0.06,-0.05 -0.22,-0.22 -0.22,-0.22l-0.19 0.19c-0.1,0.1 -0.09,0.34 0.41,0.85 0.5,0.5 0.74,0.51 0.85,0.41l0.19 -0.19c0,0 -0.14,-0.14 -0.19,-0.19 -0.05,-0.05 -0.21,-0.21 -0.21,-0.21l-0.23 0.15c-0.09,-0.09 -0.38,-0.38 -0.38,-0.38zm0.23 -1.5c-0.91,0 -1.65,0.74 -1.65,1.65 0,0.91 0.74,1.65 1.65,1.65 0.91,0 1.65,-0.74 1.65,-1.65 0,-0.91 -0.74,-1.65 -1.65,-1.65zm0 0.1c0.41,0 0.8,0.16 1.09,0.45 0.29,0.29 0.45,0.68 0.45,1.1 0,0.41 -0.16,0.8 -0.45,1.09 -0.29,0.29 -0.68,0.45 -1.09,0.45 -0.41,0 -0.8,-0.16 -1.1,-0.45 -0.29,-0.29 -0.45,-0.68 -0.45,-1.09 0,-0.41 0.16,-0.8 0.45,-1.1 0.29,-0.29 0.68,-0.45 1.1,-0.45z"></path>
                            </g>
                        </svg>
                        <p><?=@$page['tash_phone1_ru'] ?></p>
                    </div>
                    <div class="contacts-info">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.966mm" height="1.9662mm" version="1.1" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"
                             viewBox="0 0 5.12 5.12" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g>
                                <metadata></metadata>
                                <path d="M2.94 2.5l-0 -0 0.75 -0.65 0 1.4 -0.74 -0.74zm-0.64 0.11l0.01 -0.01 0.2 0.18 0 0 0.01 0 0.01 0 0.01 0 0.01 0 0 0 0.02 0 0.01 -0 0 -0 0.01 -0 0 -0 0.01 -0 0.01 -0 0 -0 0.2 -0.18 0.01 0.01 0.74 0.74 -2.02 0 0.74 -0.74zm0.26 -0l-0.98 -0.85 1.95 0 -0.98 0.85zm-1.12 -0.77l0.75 0.65 -0 0 -0.74 0.74 0 -1.4zm2.4 -0.41l-2.56 0c-0.09,0 -0.16,0.07 -0.16,0.16l0 1.92c0,0.09 0.07,0.16 0.16,0.16l2.56 0c0.09,0 0.16,-0.07 0.16,-0.16l0 -1.92c0,-0.09 -0.07,-0.16 -0.16,-0.16zm0.42 2.82c-0.45,0.45 -1.06,0.7 -1.7,0.7 -0.64,0 -1.24,-0.25 -1.7,-0.7 -0.45,-0.45 -0.7,-1.06 -0.7,-1.7 0,-0.64 0.25,-1.24 0.7,-1.7 0.45,-0.45 1.06,-0.7 1.7,-0.7 0.64,0 1.24,0.25 1.7,0.7 0.45,0.45 0.7,1.06 0.7,1.7 0,0.64 -0.25,1.24 -0.7,1.7zm-1.7 -4.26c-1.42,0 -2.56,1.15 -2.56,2.56 0,1.41 1.15,2.56 2.56,2.56 1.41,0 2.56,-1.15 2.56,-2.56 0,-1.41 -1.15,-2.56 -2.56,-2.56z"></path>
                            </g>
                        </svg>
                        <p><?=@$page['tash_email_ru'] ?></p>
                    </div>
                </div>
                <div class="contacts-info send_resume--btn">
                    <svg height="600pt" viewBox="-89 -19 600 600" width="600pt" xmlns="http://www.w3.org/2000/svg"><path d="m354.582031 39.5h-55v-27c-.019531-6.894531-5.601562-12.4804688-12.5-12.5h-161.75c-6.894531.0195312-12.480469 5.605469-12.5 12.5v27h-55c-34.511719.011719-62.484375 27.984375-62.5 62.5v398c.015625 34.511719 27.988281 62.484375 62.5 62.5h296.75c34.515625-.015625 62.488281-27.988281 62.5-62.5v-398c-.011719-34.515625-27.984375-62.488281-62.5-62.5zm-216.75-14.5h136.75v51.75h-136.75zm254.25 475c-.058593 20.683594-16.8125 37.441406-37.5 37.5h-296.75c-20.683593-.058594-37.441406-16.816406-37.5-37.5v-398c.058594-20.6875 16.816407-37.4375 37.5-37.5h55v24.875c.019531 6.894531 5.605469 12.480469 12.5 12.5h161.75c6.898438-.019531 12.480469-5.605469 12.5-12.5v-24.875h55c20.6875.0625 37.441407 16.8125 37.5 37.5zm0 0"/><path d="m312.335938 357.375h-212.25c-6.90625 0-12.5 5.597656-12.5 12.5s5.59375 12.5 12.5 12.5h212.121093c6.90625.03125 12.53125-5.535156 12.566407-12.4375.03125-6.90625-5.539063-12.53125-12.4375-12.5625zm0 0"/><path d="m312.335938 431.625h-212.25c-6.90625 0-12.5 5.597656-12.5 12.5 0 6.90625 5.59375 12.5 12.5 12.5h212.121093c6.90625.035156 12.53125-5.535156 12.566407-12.4375.03125-6.902344-5.539063-12.527344-12.4375-12.5625zm0 0"/><path d="m206.207031 230.375c25.335938 0 45.875-20.539062 45.875-45.875s-20.539062-45.875-45.875-45.875c-25.335937 0-45.875 20.539062-45.875 45.875.015625 25.328125 20.546875 45.855469 45.875 45.875zm0-66.625c11.527344 0 20.875 9.34375 20.875 20.875 0 11.527344-9.347656 20.875-20.875 20.875-11.527343 0-20.875-9.347656-20.875-20.875.019531-11.519531 9.355469-20.855469 20.875-20.875zm0 0"/><path d="m156.207031 323.75c6.894531-.019531 12.480469-5.605469 12.5-12.5v-10c0-20.710938 16.792969-37.5 37.5-37.5 20.714844 0 37.5 16.789062 37.5 37.5v10c0 6.90625 5.597657 12.5 12.5 12.5 6.90625 0 12.5-5.59375 12.5-12.5v-10c0-34.515625-27.984375-62.5-62.5-62.5s-62.5 27.984375-62.5 62.5v10c.019531 6.894531 5.605469 12.480469 12.5 12.5zm0 0"/></svg>
                    <p><?=LangHelper::t("ОТПРАВИТЬ РЕЗЮМЕ", "XULOSA YUBORISH", "SEND RESUME"); ?></p>
                </div>
                <div class="send_resume--form askQuest">
                    <div class="send_resume--close">
                        <span></span>
                    </div>
                    <?php \yii\widgets\ActiveForm::begin([
                            'method'=>'post',
                            'options' => [
                                'enctype' => 'multipart/form-data',
                            ]
                        ]) ?>
                        <input type="text" name="Resume[name]"  placeholder="<?=LangHelper::t("ФИО", "TO'LIQ ISM", "FULL NAME"); ?>" required>
                        <input type="file" name="Resume[file]" required>
                        <button type="submit"><?=LangHelper::t("ОТПРАВИТЬ", "YUBORISH", "SEND"); ?></button>
                    <?php \yii\widgets\ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="localization _category section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$category ?></div>
        <div class="slider_parts" data-aos="fade-up" data-aos-delay="200">
            <div class="wrapper">
                <?php
                if($vacancies) {
                    foreach ($vacancies as $vacancy) { ?>

                        <div class="item">
                            <a href="#" class="caption" data-id="<?=$vacancy->id ?>">
                                <img src="/images/svg/employee_alone.svg" style="max-width:200px"> <span><?=$vacancy->$title ?></span>
                            </a>
                        </div>
                    <?php }
                } ?>

            </div>
        </div>
    </div>
</div>

<?php } else { ?>

    <div class="no-content section-gap" data-aos="zoom-in">
        <div class="small_container">
            <div class="no-content--wrap">
                <img src="/images/logo.svg" alt="">
                <div class="text"><span><?=LangHelper::t("На этой странице ничего не найдено!", "Ushbu sahifada hech narsa topilmadi!", "Nothing found on this page!"); ?></span></div>
            </div>
        </div>
    </div>

<?php } ?>


<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <a href="/about/vacancy" class="preload"><?=LangHelper::t("КАРЬЕРА", "KARYERA", "CAREER"); ?></a>  <span><?=$category ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php
$script = " 
$('document').ready(function(){
    $(document).on('click','.item a',function(e){
        e.preventDefault();
        var t=$(this).find('span').text();
        
        var id = $(this).data('id');
		$.ajax({
			type: 'post',
            url: '/get-vacancy',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
                if(data.status){
                    $('.modalVacansy .modal-vacancy-text').html(data.html);
                    $('.modalVacansy h2').text(t);
                    $('.modalVacansy').fadeIn().addClass('shoow');
                    setTimeout(function(){
                        $('.scrollYY').overlayScrollbars({});
                    }, 100);
                }
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
        
        
    });

    
});";
$this->registerJs($script, yii\web\View::POS_END);