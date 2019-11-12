<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.10.2018
 * Time: 17:00
 */

use common\helpers\LangHelper;

$title = 'title_'.$lang;
$text = 'text_'.$lang;
$_title =LangHelper::t("ИСТОРИЯ КОМПАНИИ", "KOMPANIYA TARIXI", "HISTORY OF THE COMPANY");
$this->title = $_title;

?>

    <div class="history_page section-gap">
        <div class="small_container">
            <div class="flex_row_beet_cen ajax-history" style="align-items: flex-start;">
               <?php // ajax-about-history ?>


                <div class="history-text">
                    <h2 class="_black"><?=$history->$title ?></h2>
                    <p><?=$history->$text ?></p>
                </div>
                <div class="single-item history-slide">
                    <?php if($history->gallery) {
                        foreach ($history->gallery as $gal) { ?>
                            <div>
                                <img src="/uploads/history-events/<?=$history->id . '/gallery/' . $gal->image ?>" alt="">
                            </div>
                        <?php }
                    } else { ?>
                        <div>
                            <img src="/images/history.jpg" alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="navigation">
                <button class="leftArrow">
                    <img src="/images/prev-arrow.png" alt="">
                </button>
                <div class="overflow_hidden">
                    <div class="years">
                        <span class="move_box">
                            <span class="border"></span>
                        </span>

                        <?php
                        /* echo '<pre>';
                        print_r($histories);
                        echo '<pre>'; */
                        $years_count = count($histories)-1;
                        $y=-1;
                        foreach ($histories as $item ){
                            $y++;
                            $class = $years_count == $y ? ' lastChild active' : '';
                            //echo $years_count . ' ' . $y . ' ' . $class;
                            if( count($item->eventsgroup) > 1 ){ ?>
                                <a href="#" class="have_a_child <?=$class ?>">
                                    <?=$item->year ?>
                                    <span class="month">
                                    <?php foreach ($item->eventsgroup as $item_eg){ ?>
                                         <span class="history-date" data-id="<?=$item_eg->id ?>"><?=$item_eg->date ?></span>
                                    <?php } ?>
                                    </span>
                                </a>
                            <?php }elseif(count($item->eventsgroup)==1){ // если 1 дата
                                //print_r($item->eventsgroup);
                                ?>
                                <a href="#" class="history-date <?=$class ?>" data-id="<?=$item->eventsgroup[0]->id ?>"><?=$item->year ?></a>
                            <?php } ?>

                            <?php /* if( $years_count == $y ){ // последний элемент ?>
                                <a href="#" class="lastChild active history-date" data-id="<?=$item->id ?>"><?=$item->year ?></a>
                            <?php }  */  ?>

                        <?php } ?>
                    </div>
                </div>
                <button class="rightArrow">
                    <img src="/images/next-arrow.png" alt="">
                </button>
            </div>
        </div>
    </div>

    <div>

    <div class="site_bread">
        <div class="centerBox">
            <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
            <span><?=LangHelper::t("ИСТОРИЯ КОМПАНИИ", "KOMPANIYA TARIXI", "HISTORY OF THE COMPANY"); ?></span>
        </div>
    </div>

    <?= $this->render('../layouts/_footer') ?>

<?php
$server_error =LangHelper::t("Сервер недоступен! Повторите попытку позже.", "Server mavjud emas! Keyinroq qayta urinib ko‘ring.", "Server is not available! Please try again later.");

$script = "
$(document).ready(function() {
    $('.single-item').slick({prevArrow:\"<div class='history-red-prev'><img src='/images/prev-arrow_red.png'></div>\",nextArrow:\"<div class='history-red-next'><img src='/images/next-arrow_red.png'></div>\"}),$(window).on(\"load\",function(){var e=$(\".overflow_hidden\").width(),t=$(\".navigation .leftArrow\"),s=$(\".navigation .rightArrow\"),r=0,i=$(\".move_box\"),a=$(\".years .active\");$(\".years a\").each(function(e){r+=$(this).outerWidth()}),lastTotalWidth=r-e,$(\".overflow_hidden .years\").animate({scrollLeft:r},800),setTimeout(function(){scrollLeftMain=$(\".overflow_hidden .years\").scrollLeft()},810),36<lastTotalWidth&&(t.css({transform:\"scale(1)\"}),$(\".lastChild\").css(\"padding-right\",\"18px\")),i.offset({left:a.offset().left}),i.css({width:a.outerWidth()}),t.click(function(){t.attr(\"disabled\",\"disabled\"),$(\".overflow_hidden .years\").animate({scrollLeft:\"-=400\"},300),s.css({transform:\"scale(1)\"}),setTimeout(function(){var e=$(\".overflow_hidden .years\").scrollLeft();t.removeAttr(\"disabled\"),0==e&&t.removeAttr(\"style\")},850)}),s.click(function(){s.attr(\"disabled\",\"disabled\"),$(\".overflow_hidden .years\").animate({scrollLeft:\"+=400\"},300),t.css({transform:\"scale(1)\"}),setTimeout(function(){s.removeAttr(\"disabled\"),$(\".overflow_hidden .years\").scrollLeft()==scrollLeftMain&&s.css({transform:\"scale(0)\"})},850)}),$(\".years a\").click(function(e){e.preventDefault(),$(\".years a\").removeClass(\"active\"),$(this).addClass(\"active\");var t=$(this);i.offset({left:t.offset().left}),i.css({width:t.outerWidth()})})})
    
    $('.history-date').click(function(e){
        e.preventDefault();
        
        id = $(this).data('id');
        
        console.log(id);
         
        // return false;
        
        $.ajax({
            type: 'post',
            url: '/get-history',
            data: 'id='+id+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                if(data.status==1) $('.ajax-history').html(data.html);
                
                //alert(data.html)
                 
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
         });  
        
    })
    
});";
$this->registerJs($script, yii\web\View::POS_END);
