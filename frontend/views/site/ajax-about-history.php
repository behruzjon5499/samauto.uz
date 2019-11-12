<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 31.10.2018
 * Time: 17:45
 */

$title = 'title_' . $lang;
$text = 'text_' . $lang;
$_title = $history->$title;
$this->title = $_title;
?>

<div class="history-text">
    <h2 class="_black"><?=$_title ?></h2>
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

<script>
    $(".single-item").slick({prevArrow:"<div class='history-red-prev'><img src='/images/prev-arrow_red.png'></div>",nextArrow:"<div class='history-red-next'><img src='/images/next-arrow_red.png'></div>"}),$(window).on("load",function(){var e=$(".overflow_hidden").width(),t=$(".navigation .leftArrow"),s=$(".navigation .rightArrow"),r=0,i=$(".move_box"),a=$(".years .active");$(".years a").each(function(e){r+=$(this).outerWidth()}),lastTotalWidth=r-e,$(".overflow_hidden .years").animate({scrollLeft:r},800),setTimeout(function(){scrollLeftMain=$(".overflow_hidden .years").scrollLeft()},810),36<lastTotalWidth&&(t.css({transform:"scale(1)"}),$(".lastChild").css("padding-right","18px")),i.offset({left:a.offset().left}),i.css({width:a.outerWidth()}),t.click(function(){t.attr("disabled","disabled"),$(".overflow_hidden .years").animate({scrollLeft:"-=400"},300),s.css({transform:"scale(1)"}),setTimeout(function(){var e=$(".overflow_hidden .years").scrollLeft();t.removeAttr("disabled"),0==e&&t.removeAttr("style")},850)}),s.click(function(){s.attr("disabled","disabled"),$(".overflow_hidden .years").animate({scrollLeft:"+=400"},300),t.css({transform:"scale(1)"}),setTimeout(function(){s.removeAttr("disabled"),$(".overflow_hidden .years").scrollLeft()==scrollLeftMain&&s.css({transform:"scale(0)"})},850)}),$(".years a").click(function(e){e.preventDefault(),$(".years a").removeClass("active"),$(this).addClass("active");var t=$(this);i.offset({left:t.offset().left}),i.css({width:t.outerWidth()})})})
</script>