<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\MainAsset;
//use common\widgets\Alert;
use common\helpers\LangHelper;

if( Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index'  ){
    MainAsset::register($this);
    $is_main = true;

}else{
    $is_main = false;
}


$lang = Yii::$app->session->get('lang');
if($lang=='') $lang = 'ru';

AppAsset::register($this);


if($files = \common\models\Pages::find()->where(['page'=>'files'])->one()){

    $files = json_decode($files->data,true);

}else{

    $files = false;

}

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
    <?php $this->head() ?>
</head>
<body style="<?=$is_main ? 'overflow-y: hidden' : '' ?>">
<?php $this->beginBody() ?>

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
                <input type="text" id="download_price_name" placeholder="<?=Yii::t('app','Имя') ?>*" autocomplete="off">
                <input type="email"  id="download_price_email" placeholder="E-mail*" autocomplete="off">
                <input type="company" id="download_price_company" placeholder="<?=Yii::t('app','Компания') ?>" autocomplete="off">
                <input type="phone" id="download_price_phone" placeholder="<?=Yii::t('app','Телефон') ?>" autocomplete="off">
                <a href="/uploads/files/<?=$files['file_price'] ?>" class="redBtn download-price" download=""><span><?=Yii::t('app','Скачать') ?></span></a>
            </div>
        </div>
    </div>
</div>

<?php

$show_action_popup = (isset( $_COOKIE['sap'] ) && $_COOKIE['sap'] == 0 ) || !isset( $_COOKIE['sap'] ) ? true : false;

// print_r($_COOKIE);

if( $is_main && $show_action_popup ){

    if ($action = \common\models\Actions::find()->where(['status' => 1])->andWhere(['>=','date_end',time()])->one()) { ?>
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
                            <span><?=LangHelper::t("Больше не показывать", "Boshqa ko'rsatilmasin", "Do not show again"); ?></span>
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
            <input type="text" name="q" placeholder="<?=LangHelper::t("ПОИСК", "QIDIRUV", "SEARCH"); ?> . . .">
        </form>
    </div>
</div>

<div class="pageWrapper">

    <?= $this->render('_header') ?>
    <?= $content ?>

</div>


<?php // page_wrap

$server_error = LangHelper::t('Сервер недоступен! Повторите попытку позже.','Server mavjud emas! Keyinroq qayta urinib ko‘ring.','Server is not available! Please try again later.');


// информация о событиях
if( ! $info = Yii::$app->session->getFlash('info') ){
    $info ='';
}

$info_success = LangHelper::t("Ваша заявка успешно отправлена!", "Sizning arizangiz muvaffaqiyatli yuborildi!", "Your application has been sent successfully!");


if($lang=='ru') {
    $labels = '["нед", "дня", "час", "мин", "сек"]';
}elseif ($lang=="en"){
    $labels = '["week", "day", "hour", "min", "sec"]';
}elseif ($lang=="uz"){
    $labels = '["хафт", "кун", "соат", "мин", "сек"]';
}
if(isset($action)){
	$date_end = date('m, d, Y',$action->date_end);
}else{
	$date_end = date('m, d, Y',time()); // не найдена акция
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
            if($('.active-slide').length > 0){
                $('.active-slide .aos-init').addClass('aos-animate');   
            }
        }, 1000)
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
$this->registerJs($script, yii\web\View::POS_END);

 

?>


<?php $this->endBody() ?></body>
</html>
<?php $this->endPage() ?>
