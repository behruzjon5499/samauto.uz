<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\helpers\LangHelper;
use common\models\Dillers;
use common\models\PickupForm;
use common\models\Regions;
use frontend\assets\AppAsset;
use frontend\assets\MainAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;

if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') {
    MainAsset::register($this);
    $is_main = true;

} else {
    $is_main = false;
}


$lang = Yii::$app->session->get('lang');
if ($lang == '') $lang = 'ru';

AppAsset::register($this);


if ($files = \common\models\Pages::find()->where(['page' => 'files'])->one()) {

    $files = json_decode($files->data, true);

} else {

    $files = false;

}
$regions = ArrayHelper::map(Regions::find()->all(),'id','name_ru');
$dillers = ArrayHelper::map(Dillers::find()->all(),'id','title_ru');
$model = new PickupForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html <?= $is_main ? 'class="fsvs"' : '' ?> lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="handheldfriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="YES">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        .right-buttons {
            position: fixed;
            right: 10px;
            bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 99999;
        }

        .right-buttons:hover a.animated-btn {
            width: 280px;

        }

        a.animated-btn {
            border: none;
            width: 4rem;
            height: 4rem;
            margin-bottom: 0.8rem;
            border-radius: 3rem;
            background: #be2829;
            color: #fff;
            position: relative;
            transition: 0.3s;
            display: flex;
            align-items: center;
            text-decoration: none;
            overflow: hidden;
        }

        a.animated-btn svg {
            position: absolute;
            left: 20px;
            top: 50%;
            font-size: 24px;
            transform: translate(0%, -50%);
            color: #fff;
        }

        a.animated-btn div {
            line-height: 16px;

            opacity: 0;
            transition: opacity 0.4s 0.3s ease;
            position: absolute;
            left: 64px;
            color: white;
        }

        .right-buttons:hover a.animated-btn div {
            opacity: 1;
        }
    </style>
    <?php $this->head() ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(57162376, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/57162376" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156809049-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-156809049-1');
    </script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-184924202-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-184924202-1');
    </script>

</head>
<body style="<?= $is_main ? 'overflow-y: hidden, position: relative;' : 'position: relative;' ?>">
<?php $this->beginBody() ?>


<div class="right-buttons">
    <a href="#" class="animated-btn  _ask_btn">
        <div id="pickupform">  <?= LangHelper::t("Запись на тест драйв", "Test drayvga <br> ro'yxatdan o'tish", "Registration <br> for a test drive"); ?></div>
        <svg height="24" fill="white" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" role="img">
            <path d="M12.665 20.641v-5.71c1.174-.236 2.029-1.092 2.265-2.266h5.711c-.285 4.525-3.452 7.692-7.976 7.976m-9.306-7.976H9.07c.236 1.174 1.091 2.03 2.265 2.265v5.711c-4.524-.284-7.691-3.45-7.976-7.976M12 13.668c-1.014 0-1.668-.655-1.668-1.668s.654-1.669 1.668-1.669 1.668.656 1.668 1.67-.654 1.667-1.668 1.667M12 3.33c4.879 0 8.343 3.261 8.641 8.006h-5.71C14.653 9.95 13.511 9.002 12 9.002s-2.652.947-2.931 2.333h-5.71C3.657 6.59 7.121 3.33 12 3.33M12 2C6.19 2 2 6.19 2 12s4.19 10 10 10 10-4.19 10-10S17.81 2 12 2"></path>
        </svg>
    </a>
    <a href="https://samauto.uz/images/360/index.html" class="animated-btn">
        <div><?= LangHelper::t("Шоу рум 360", "Shov rum 360", "Show room 360"); ?></div>
        <svg width="24" fill="white" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img">
            <circle cx="12" cy="15.95" r="1"></circle>
            <path d="M22.12 12.22h-1.45l.24.54v.09l.05.08a4.32 4.32 0 01.58 1.52c-1.5.21-3.06.39-4.67.51l.1 1.32c1.6-.12 3.16-.29 4.66-.5v5.7a.29.29 0 01-.28.28h-2a.28.28 0 01-.28-.28v-1.82H4.89v1.81a.3.3 0 01-.3.29h-2a.28.28 0 01-.28-.28v-5.67c1.54.21 3.13.38 4.77.5L7.19 15a70.09 70.09 0 01-4.78-.5A4.7 4.7 0 013 12.93V12.76l.73-1.66c2.09.25 4.19.4 6.28.46V10.2c-1.9 0-3.81-.16-5.71-.38L5.49 7.3A2.06 2.06 0 017 6.42h3.1V5.09H6.91a3.36 3.36 0 00-2.59 1.58L3 9.66Q1.69 9.5.39 9.27H.33l-.11.66-.06.66c.76.13 1.52.24 2.29.35l-.58 1.29A5.87 5.87 0 001 15.29v6.19a1.61 1.61 0 001.61 1.61h2a1.63 1.63 0 001.63-1.62V21h11.54v.49a1.61 1.61 0 001.61 1.61h2A1.62 1.62 0 0023 21.48v-6.19a5.87 5.87 0 00-.87-3.07z">
            </path>
            <path d="M22.67 1.33v8.34h-8.34V1.33zM24 0H13v11h11z"></path>
            <path d="M17.6 8.41l-2.47-2.47.94-.94 1.53 1.53L21.13 3l.94.94z"></path>
        </svg>
    </a>
</div>

<div class="full-page-definder"></div>
<div class="definder_1540"></div>
<div class="min768"></div>

<div class="site_modal modalPriceList">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span>
            </div>
            <div>
                <input type="text" id="download_price_name" placeholder="<?= LangHelper::t("Имя", "Исми", "Name"); ?>*"
                       autocomplete="off">
                <input type="email" id="download_price_email" placeholder="E-mail*" autocomplete="off">
                <input type="company" id="download_price_company"
                       placeholder="<?= LangHelper::t("Компания", "Kompaniya", "Company"); ?>" autocomplete="off">
                <input type="phone" id="download_price_phone"
                       placeholder="<?= LangHelper::t("Телефон", "Telefon raqami", "Phone"); ?>" autocomplete="off">
                <a href="/uploads/files/<?= $files['file_price'] ?>" class="redBtn download-price"
                   download=""><span><?= LangHelper::t("Скачать", "Yuklab olish", "Download"); ?></span></a>
            </div>
        </div>
    </div>
</div>

<?php

$show_action_popup = (isset($_COOKIE['sap']) && $_COOKIE['sap'] == 0) || !isset($_COOKIE['sap']) ? true : false;

// print_r($_COOKIE);

if ($is_main && $show_action_popup) {

    if ($action = \common\models\Actions::find()->where(['status' => 1])->andWhere(['>=', 'date_end', time()])->one()) { ?>
        <div class="modalStock">
            <div class="wrapper">
                <div class="stock-item">
                    <img src="/images/svg/cancel.svg" class="close">
                    <div class="flex_row">
                        <div class="countdown-container main-example" id="main-example-popup">
                        </div>
                    </div>
                    <a href="/action-item/<?= $action->link ?>"><img
                                src="/uploads/actions/<?= $action->id . '/' . $action->image ?>" class="main"></a>
                    <div class="checkbox-ui hide-action-popup">
                        <input type="checkbox" class="cbx cb-hide-popup" id="cbx">
                        <label for="cbx" class="check">
                            <svg width="18px" height="18px" viewBox="0 0 18 18">
                                <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                <polyline points="1 9 7 14 15 4"></polyline>
                            </svg>
                            <span><?= LangHelper::t("Больше не показывать", "Boshqa ko'rsatilmasin", "Do not show again"); ?></span>
                        </label>
                    </div>

                </div>
            </div>
        </div>
    <?php }
} ?>

<div class="search_ui">
    <div class="overlayClose"></div>
    <div class="wrap">
        <form action="/search">
            <input type="text" name="q" placeholder="<?= LangHelper::t("ПОИСК", "QIDIRUV", "SEARCH"); ?> . . .">
        </form>
    </div>
</div>

<div class="pageWrapper">

    <?= $this->render('_header') ?>
    <?= $content ?>

</div>


<?php // page_wrap

$server_error = LangHelper::t("Сервер недоступен! Повторите попытку позже.", "Server mavjud emas! Keyinroq qayta urinib ko‘ring.", "Server is not available! Please try again later.");


// информация о событиях
if (!$info = Yii::$app->session->getFlash('info')) {
    $info = '';
}

$info_success = LangHelper::t("Ваша заявка успешно отправлена!", "Sizning arizangiz muvaffaqiyatli yuborildi!", "Your application has been sent successfully!");


if ($lang == 'ru') {
    $labels = '["нед", "дня", "час", "мин", "сек"]';
    $l_parse = [
        1 => "нед",
        2 => "дня",
        3 => "час",
        4 => "мин",
        5 => "сек"
    ];
} elseif ($lang == "en") {
    $labels = '["week", "day", "hour", "min", "sec"]';
    $l_parse = [
        1 => "week",
        2 => "day",
        3 => "hour",
        4 => "min",
        5 => "sec"
    ];
} elseif ($lang == "uz") {
    $labels = '["hafta", "kun", "soat", "daqiqa", "sec"]';
    $l_parse = [
        1 => "hafta",
        2 => "kun",
        3 => "soat",
        4 => "daqiqa",
        5 => "sec"
    ];
}
if (isset($action)) {
    $date_end = date('m, d, Y', $action->date_end);
} else {
    $date_end = date('m, d, Y', time()); // не найдена акция
}
$script = "

var info = '{$info}';
if( info.length >0 ) alert(info);

$(document).ready(function () {
    if($('.full-page-definder').is(':visible')) {
       setTimeout(function(){
            AOS.init({
                duration: 800,
                offset: 50,
            });
            $('.active-slide .aos-init').addClass('aos-animate');
        }, 1000)
    } else {
        AOS.init({
            disable: true
        });
    }

   $('.add-calls').click(function(){
        var name = $('#call_name').val();
        var phone = $('#call_phone').val();
        var email = $('#call_email').val();

        if(name.length==0) {
        $('#call_name').focus();
            alert('Укажите свое имя!');
            return false;
        }
        if(phone.length==0) {
        $('#call_phone').focus();
            alert('Необходимо указать номер телефона!');
            return false;
        }
        if(email.length>0 && !checkEmail(email)){
        $('#call_email').focus();
            alert('Укажите правильный email!');
            return false;
        }
        $.ajax({
            type: 'post',
            url: '/send-phone',
            data: 'phone='+phone+'&name='+name+'&email='+email+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                $('.modal_call .closeBtn').click();
                if(data.status==1){
                    $('.link-download-price').click();
                    alert('{$info_success}')
                }
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
        });

   });

   $('.download-price').click(function(){

        if( $('#download_price_name').val().length<2 ) {
            $('#download_price_name').focus();
            return false;
        }
        if( ! checkEmail( $('#download_price_email').val() ) ) {
            $('#download_price_email').focus();
            return false;
        }

        phone = $('#download_price_phone').val();
        company = $('#download_price_company').val();
        email= $('#download_price_email').val();
        name = $('#download_price_name').val();

        $.ajax({
            type: 'post',
            url: '/site/download-price',
            data: 'phone='+phone+'&name='+name+'&email='+email+'&company='+company+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                $('.modalPriceList .closeBtn').click();
            },
            error: function(data){
                alert( '{$server_error}' ) ;
            }
        });
   });

   function checkEmail(email){
       var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
       return reg.test(email);
   }

    $('.hide-action-popup').mouseup(function(){
        status = $('.hide-action-popup .cb-hide-popup').prop('checked') ? 0 : 2 ;
        set_cookie('sap',status,999999999);
    })

    $('.modalStock .close').click(function(){
        $('.modalStock').fadeOut();
        set_cookie('sap','1',360000);
    })

    function set_cookie ( name, value, exp, path, domain, secure ){
      var cookie_string = name + \"=\" + escape ( value );
      if ( exp ) {
        var date = new Date(); // Берём текущую дату
        date.setTime(date.getTime()+exp); // Возвращаемся в \"прошлое\"
        cookie_string += \"; expires=\" + date.toGMTString();
      }
      if ( path )  cookie_string += \"; path=\" + escape ( path );
      if ( domain ) cookie_string += \"; domain=\" + escape ( domain );
      if ( secure ) cookie_string += \"; secure\";
      document.cookie = cookie_string;
    }


});";

$script2 = "
$(document).ready(function () {
    var labels = {$labels},
        nextYear = (new Date('{$date_end}')),
        template = _.template('<div class=\"time <%= label %>\"><span class=\"count curr top\"><%= curr %></span><span class=\"count next top\"><%= next %></span><span class=\"count next bottom\"><%= next %></span><span class=\"count curr bottom\"><%= curr %></span><span class=\"label\"><%= label.length < 6 ? label : label.substr(0, 3)  %></span></div>'),
        currDate = '00:00:00:00:00',
        nextDate = '00:00:00:00:00',
        parser = /([0-9]{2})/gi,
        example = $('#main-example-popup');
    // Parse countdown string to an object
    function strfobj(str) {
        var parsed = str.match(parser),obj = {};
        labels.forEach(function(label, i) {
            obj[label] = parsed[i]
        });
        return obj;
    }
    // Return the time components that diffs
    function diff(obj1, obj2) {
        var diff = [];
        labels.forEach(function(key) {
            if (obj1[key] !== obj2[key]) {
                diff.push(key);
            }
        });
        return diff;
    }
    // Build the layout
    var initData = strfobj(currDate);
    labels.forEach(function(label, i) {
        example.append(template({
            curr: initData[label],
            next: initData[label],
            label: label
        }));
    });

    // Starts the countdown
    example.countdown(nextYear, function(event) {
        var newDate = event.strftime('%w:%d:%H:%M:%S'),data;
        if (newDate !== nextDate) {
            currDate = nextDate;
            nextDate = newDate;
            // Setup the data
            data = {
                'curr': strfobj(currDate),
                'next': strfobj(nextDate)
            };
            // Apply the new values to each node that changed
            diff(data.curr, data.next).forEach(function(label) {
                var selector = '.%s'.replace(/%s/, label),
                    node = example.find(selector);
                // Update the node
                node.removeClass('flip');
                node.find('.curr').text(data.curr[label]);
                node.find('.next').text(data.next[label]);
                // Wait for a repaint to then flip
                _.delay(function(node) {
                    node.addClass('flip');
                }, 50, node);
            });
        }
    });

    $('.end-date').each(function () {
        var datee = $(this).attr('data-date');
        $(this).countdown(datee, function (event) {
            $(this).html(event.strftime(''
                + '<div class=\"end-date--pace\"><span>%w</span><span>{$l_parse[1]}</span></div>'
                + '<div class=\"end-date--pace\"><span>%d</span><span>{$l_parse[2]}</span></div>'
                + '<div class=\"end-date--pace\"><span>%H</span><span>{$l_parse[3]}</span></div>'
                + '<div class=\"end-date--pace\"><span>%M</span><span>{$l_parse[4]}</span></div>'
                + '<div class=\"end-date--pace\"><span>%S</span><span>{$l_parse[5]}</span></div>'));
        });
    });

 });
";

$this->registerJs($script, yii\web\View::POS_END);

if (isset($action) || (isset($this->params['actions']) && !empty($this->params['actions']))) {
    $this->registerJs($script2, yii\web\View::POS_END);
}


?>
<div class="site_modal askQuest ask_a_question">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span></div>
            <div class="title"><?= LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></div>
            <?php $form = \yii\widgets\ActiveForm::begin(['action' => '/site/pickup-form', 'method' => 'post']);

            ?>
            <div class="_row">
                <div class="col-6">
                    <div class="inf">
                        <label for=""><?= LangHelper::t("Регион", "Viloyat", "Region"); ?></label>
                        <?= $form->field($model, 'region')->dropDownList(
                         $regions,
                         ['options'=> ['class' => 'region']]

    )->label(false);
                        ?>
                    </div>
                    <div class="inf">
                        <label for=""><?= LangHelper::t("Дилер", "Diller", "Diller"); ?></label>
                        <?= $form->field($model, 'diller')->dropDownList(
                            $dillers
                        )->label(false)  ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="inf">
                        <label for=""><?= LangHelper::t("Фамилия", "Familya", "Last Name"); ?></label>
                        <?= $form->field($model, 'last_name')->textInput()->label(false) ?>
                    </div>
                    <div class="inf">
                        <label for=""><?= LangHelper::t("Имя", "Ism", "First_name"); ?></label>
                        <?= $form->field($model, 'first_name')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="_row">
                <div class="col-6">
                    <div class="inf">
                        <label for=""><?= LangHelper::t("Телефон", "Telefon", "Phone"); ?></label>
                        <?= $form->field($model, 'phone')->textInput()->label(false) ?>
                    </div>
                    <div class="inf">
                        <div class="oferta">
                            <?= $form->field($model, 'check')->checkbox(['onclick' =>
                                'showInternDetails()','style'=>'width:20px;'])->label(false); ?>
                            <a href="http://xarid.samauto.uz/uploads/22.docx">Download</a>
                        </div>
                        <div class="inf">
                            <div class="oferta">
                                <?= $form->field($model, 'check1')->checkbox(['onclick' =>
                                    'showInternDetails()','style'=>'width:20px;'])->label(false); ?>
                                <a href="http://xarid.samauto.uz/uploads/22.docx">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                <div class="inf">
                    <label for=""><?= LangHelper::t("Отчество", "Otasining ismi", "Middle Name"); ?></label>
                    <?= $form->field($model, 'middle_name')->textInput()->label(false) ?>
                </div>
                <div class="inf">
                    <label for=""><?= LangHelper::t("E-mail", "E-mail", "E-mail"); ?></label>
                    <?= $form->field($model, 'email')->textInput()->label(false) ?>
                </div>
            </div>
            </div>
            <button type="submit" class="ButtonBox js_internal-link">
                <span class="ButtonBox-text"><?= LangHelper::t("ОТПРАВИТЬ", "YUBORISH", "SEND"); ?></span>
                <span class="ButtonBox-icon">
                                    <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path
                                                d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                                </span>
            </button>
            <?php \yii\widgets\ActiveForm::end() ?>
        </div>
    </div>
</div>

<?php

if (!$info = Yii::$app->session->getFlash('info')) {
    $info = '';
}

$server_error = LangHelper::t("Ошибка сервера!", "Serverda xatolik!", "Server error!");

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
    
 $('#pickupform-region').on('click', function () {
       
      var id = $(this).val();
           console.log(id);
           console.log(33);
        $.ajax({
            type: 'get',
            url: '/site/diller',
            data:{id:id},
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.status==1) $('.ajax-leader-wrap').html(data.html);
                
            },
     
        });
   })
});";


$this->registerJs($script, yii\web\View::POS_END); ?>


<?php $this->endBody() ?></body>
</html>
<?php $this->endPage() ?>
