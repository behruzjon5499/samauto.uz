<?php

use common\models\Favorites;
use common\models\Gallery;
use yii\widgets\ActiveForm;
use common\helpers\LangHelper;

$_lang = ['ru'=>'RU','uz'=>'UZ','en'=>'EN'];

// мультиязычность
$lang = Yii::$app->session->get('lang');
if( $lang == '' ) {
    $lang = 'ru';
    Yii::$app->session->set('lang',$lang);
}

$title = 'title_' . $lang;
$link  = 'link_' . $lang;

$is_main = Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? true : false;

$user_id = Yii::$app->user->isGuest ? 0 : Yii::$app->user->id ;

$params = Yii::$app->request->queryParams;

$action = explode('/',Yii::$app->request->getUrl());

$action = explode('?',$action[1]);

$action = $action[0];

if($page = \common\models\Pages::find()->where(['page'=>'main'])->one()){

    $page = json_decode($page->data,true);

}else{

    $page = false;

}
if($files = \common\models\Pages::find()->where(['page'=>'files'])->one()){

    $files = json_decode($files->data,true);

}else{

    $files = false;

}

/*echo $title .'<pre>';
print_r($page);
echo '</pre>';*/

?>

    <div class="fullpage_header flex_row_beet_cen <?=$is_main ? 'land_header' : 'page_header bgWhite' ?>" style="<?=Yii::$app->controller->action->id=='contacts' ? 'background-color: #fff' : '' ?>">
        <div class="leftBox flex_row_beet_cen">
            <div style="display: flex;">
                <div class="menuBar">
                    <span class="sp1"></span>
                    <span class="sp2"></span>
                    <span class="sp3"></span>
                </div>
                <a href="/" class="logo preload">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="10.3607mm" height="2.0628mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 859.19 171.06"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                         <g>
                             <metadata/>
                             <path d="M99.27 118.81c0,-16.93 -4.54,-34.54 -36.77,-49.05 -14.03,-6.29 -22.45,-12.29 -22.45,-24.38 0,-11.8 6.97,-19.06 20.03,-19.06 10.16,0 19.06,3.58 24.87,7.26l8.23 -23.9c-7.94,-5.32 -21,-9.68 -38.89,-9.68 -32.42,0 -52.63,23.22 -52.63,51.28 0,16.15 7.26,34.35 33.09,45.86 16.93,7.45 23.22,14.03 23.22,24.67 0,11.8 -8.42,19.84 -22.26,19.84 -11.61,0 -21.48,-4.06 -26.8,-7.74l-8.9 27.28c9.39,6.29 22.93,9.87 43.54,9.87 32.9,0 55.83,-22.26 55.83,-52.24l-0.09 -0.01zm113.21 42.58l0 -77.79c0,-35.32 -21.77,-47.6 -51.28,-47.6 -22.93,0 -39.86,6 -49.05,9.87l8.23 21.48c8.42,-3.87 21.29,-7.94 33.87,-7.94 13.74,0 22.93,3.87 22.93,17.41l0 6c-39.18,3.58 -72.76,13.54 -72.76,47.12 0,27.09 19.35,41.12 56.99,41.12 22.45,0 40.15,-3.87 50.99,-9.68l0.09 0.01zm-35.32 -13.74c-3.38,1.64 -8.23,2.61 -13.74,2.61 -14.99,0 -23.71,-6.48 -23.71,-21.77 0,-20.8 14.7,-26.12 37.44,-28.25l0 47.41 0.01 0zm225.73 23.42l0 -91.34c0,-22.93 -15.96,-41.31 -46.93,-41.31 -21.48,0 -34.83,6 -43.06,13.06 -7.45,-7.26 -19.84,-13.06 -41.31,-13.06 -22.74,0 -38.22,3.09 -52.63,9.68l0 122.97 37.73 0 0 -106.53c4.54,-1.74 8.52,-2.42 15.19,-2.42 13.06,0 20.32,6.78 20.32,17.12l0 91.82 37.73 0 0 -102.66c4.35,-4.35 9.87,-6.29 16.44,-6.29 13.06,0 18.87,7.74 18.87,17.61l0 91.34 37.73 0 -0.08 0.01zm151.62 0l-53.89 -166.23 -38.22 0 -54.09 166.23 35.03 0 10.64 -35.51 50.02 0 10.16 35.51 40.34 0 0.01 0zm-55.83 -57.96l-38.89 0 15.48 -54.19c3.38,-11.8 4.35,-20.03 4.35,-20.03l0.48 0c0,0 0.68,8.42 3.87,20.03l14.7 54.19zm165.36 47.89l0 -122.49 -37.73 0 0 104.11c-4.06,2.13 -8.9,3.09 -15.67,3.09 -12.77,0 -17.9,-7.74 -17.9,-17.12l0 -90.18 -37.73 0 0 87.46c0,31.45 17.9,45.19 54.57,45.19 24.38,0 42.29,-4.16 54.38,-10.16l0.09 0.1zm79.34 6l0 -23.22c-3.09,0.97 -4.83,1.45 -7.94,1.45 -8.42,0 -12.09,-5.32 -12.09,-15.19l0 -67.15 20.03 0 0 -24.38 -20.03 0 0 -37.44 -37.73 9.68 0 27.77 -14.22 0 0 24.38 14.22 0 0 70.05c0,20.03 11.8,37.73 39.18,37.73 8.71,0 15.48,-2.13 18.58,-3.58l0 -0.1zm115.82 -63.57c0,-38.89 -19.84,-67.44 -57.76,-67.44 -37.44,0 -57.28,28.54 -57.28,67.44 0,38.89 19.84,67.64 57.47,67.64 37.73,0 57.47,-28.73 57.47,-67.64l0.1 0zm-37.44 -0.48c0,23.42 -3.38,42.58 -20.03,42.58 -16.44,0 -20.03,-19.06 -20.03,-42.58 0,-23.22 3.38,-43.54 20.03,-43.54 16.64,0 20.03,20.32 20.03,43.54z"/>
                         </g>
                    </svg>
                </a>
            </div>
            <div class="downloads">
                <?php if(isset($files['file_catalog']) && $files['file_catalog']!='' ){ ?>
                    <a href="/uploads/files/<?=$files['file_catalog'] ?>" download class="under-hover"><?=LangHelper::t("СКАЧАТЬ КАТАЛОГ", "KATALOGNI YUKLAB OLING", "DOWNLOAD THE CATALOG"); ?></a>
                <?php } ?>
                <a href="/actions" class="under-hover preload"><?=LangHelper::t("АКЦИИ", "MA'LUMOTLAR", "PROMOTIONS"); ?></a>
                <a href="/about/faq" class="under-hover preload"><?=LangHelper::t("FAQ", "FAQ", "FAQ"); ?></a>
                <a href="/contacts" class="under-hover preload"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?></a>
            </div>
        </div>
        <div class="rightBox flex_row_end_cen">
            <div class="search">
                <form action="">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="2.3098mm" height="2.28mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                         viewBox="0 0 17.24 17.02"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
						 <g>
                             <metadata/>
                             <g>
                                 <path d="M-0 6.9c0,1.33 0.14,2.27 0.7,3.37 0.46,0.91 1.1,1.82 1.92,2.45 0.97,0.75 1.73,1.14 2.96,1.45 0.27,0.07 0.46,0.09 0.77,0.13 1.54,0.21 2.85,-0.13 4.19,-0.8l0.9 -0.52 3.01 3.71c0.72,0.76 1.11,0.06 1.83,-0.65 0.21,-0.22 0.98,-0.87 0.98,-1.15 0,-0.62 -0.86,-1.1 -1.39,-1.56 -0.65,-0.57 -1.44,-1.17 -2.13,-1.75 -0.09,-0.08 -0.17,-0.13 -0.27,-0.21 -0.13,-0.11 -0.12,-0.12 -0.28,-0.21 0.04,-0.15 0.12,-0.26 0.2,-0.39 0.09,-0.14 0.14,-0.25 0.21,-0.39 0.91,-1.82 0.97,-3.74 0.32,-5.66 -0.08,-0.25 -0.17,-0.4 -0.26,-0.63l-0.3 -0.56c-0.06,-0.1 -0.12,-0.17 -0.18,-0.27l-0.36 -0.5c-0.15,-0.21 -0.65,-0.75 -0.85,-0.91 -0.85,-0.65 -0.8,-0.71 -1.87,-1.22 -0.37,-0.18 -0.89,-0.33 -1.32,-0.44 -1.44,-0.35 -3.15,-0.19 -4.48,0.41 -1.61,0.72 -2.6,1.72 -3.44,3.17l-0.41 0.89c-0.08,0.22 -0.15,0.45 -0.22,0.68 -0.12,0.41 -0.23,1.05 -0.23,1.56zm7.16 -5.46c3.14,0 5.68,2.54 5.68,5.68 0,3.13 -2.54,5.68 -5.68,5.68 -3.14,0 -5.68,-2.54 -5.68,-5.68 0,-3.14 2.54,-5.68 5.68,-5.68z"/>
                                 <path d="M3.68 7.82c-0.01,-0.47 0.01,-0.78 0.14,-1.23 0.55,-1.93 1.81,-3.01 3.79,-3.23 0.27,0 0.43,-0.03 0.49,-0.09 0.36,-0.61 0.09,-0.9 -0.81,-0.88 -2.41,0.03 -3.94,1.31 -4.6,3.84 -0.09,0.33 -0.23,0.97 -0.08,1.36 0.11,0.29 0.63,0.48 0.89,0.42 0.1,-0.02 0.16,-0.08 0.18,-0.19z"/>
                             </g>
                         </g>
					</svg>
                    <?php /* <div class="inp">
                        <input type="text" placeholder="найти легковой автомобиль">
                    </div> */ ?>
                </form>
            </div>
            <div class="lang">
                <a href="#" class="under-hover"><?=$lang ?></a>
                <div class="drop">
                    <div>
                       <?php if($lang!='ru'){ ?>
                            <a href="/lang/ru" class="under-hover preload">RU</a>
                        <?php } ?>
                       <?php if($lang!='uz'){ ?>
                            <a href="/lang/uz" class="under-hover preload">UZ</a>
                        <?php } ?>
                       <?php if($lang!='en'){ ?>
                            <a href="/lang/en" class="under-hover preload">EN</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fullpage_menu">
        <ul>
            <li class="overlayClose"></li>
            <li style="transition-delay: 0s;"><a href="/transport/bus" class="preload"><?=LangHelper::t("АВТОБУСЫ", "AVTOBUSLAR", "BUSES"); ?></a></li>
            <li style="transition-delay: 0.1s;"><a href="/transport/trucks" class="preload"><?=LangHelper::t("ГРУЗОВЫЕ АВТОМОБИЛИ", "YUK MASHINALARI", "TRUCKS"); ?></a></li>
            <li style="transition-delay: 0.2s;"><a href="/transport/special" class="preload"><?=LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL BODY TRUCKS"); ?></a></li>
            <li style="transition-delay: 0.3s;"><a href="/dillers" class="preload"><?=LangHelper::t("ДИЛЕРЫ", "DILERLAR", "DEALERS"); ?></a></li>
            <li style="transition-delay: 0.4s;"><a href="/services" class="preload"><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></a></li>
            <li style="transition-delay: 0.5s;"><a href="/localization/about" class="preload"><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "JOYLASHTIRISH", "LOCALIZATION"); ?></a></li>
            <li style="transition-delay: 0.6s;"><a href="/news/archive" class="preload"><?=LangHelper::t("НОВОСТИ", "YANGILIKLAR", "NEWS"); ?></a></li>
            <li style="transition-delay: 0.7s;" class="desktop_hide preload"><a href="/contacts"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?></a></li>
            <li style="transition-delay: 0.8s;"><a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a></li>
        </ul>
        <div class="downloads">
            <a href="#" class="link-download-price" download><?=LangHelper::t("СКАЧАТЬ ПРАЙС", "PRAISNI YUKLAB OLING", "DOWNLOAD THE PRICE"); ?></a>
            <a href="#" download><?=LangHelper::t("СКАЧАТЬ КАТАЛОГ", "KATALOGNI YUKLAB OLING", "DOWNLOAD THE CATALOG"); ?></a>
        </div>
    </div>


<?php
$server_error = LangHelper::t("Сервер недоступен! Повторите попытку позже.", "Server mavjud emas! Keyinroq qayta urinib ko‘ring.", "Server is not available! Please try again later.");
$script = "

$(document).ready(function () {

    $('.send-phone').click(function(){        
        var name = $('#modal-call #name').val();
        var phone = $('#modal-call #phone').val();        
        var id = $('#modal-call #id').val();        
        if(name.length==0 ){ 
            $('#modal-call #name').focus();
            return false;         
        }        
        if(phone.length == 0) {
            $('#modal-call #phone').focus();
            return false;
        }         
        $.ajax({
            type: 'post',
            url: '/send-phone',
            data: 'id='+id+'&name='+name+'&phone='+phone+'&_csrf=' + yii.getCsrfToken(), 
            dataType: 'json',
            success: function(data){
                $('#modal-call').modal('toggle');
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
         });
    });   

});";

$this->registerJs($script, yii\web\View::POS_END);

