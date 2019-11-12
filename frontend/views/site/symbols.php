<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 04.12.2018
 * Time: 13:47
 */

use common\helpers\LangHelper;
 
$flag = 'flag_' .$lang;
$gerb = 'gerb_' .$lang;
$gimn = 'gimn_' .$lang;
$gimn_title = 'gimn_title_'.$lang;
$gimn_author = 'gimn_author_'.$lang;

$title =LangHelper::t("ГОСУДАРСТВЕННЫЙ ФЛАГ РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT BAYROQI", "STATE FLAG OF THE REPUBLIC OF UZBEKISTAN");
$this->title = $title;

/*
echo '<pre>';
print_r($symbols);
echo '</pre>'; */

?>
<div class="site_modal modalFlag state_modal">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span>
            </div>
            <div class="mTitle3 text_center"><?=$title ?></div>
            <div class="scrollY">
                <div class="textBox">
                    <img src="/uploads/symbols/flag.svg" alt="">
                    <?=@$symbols[$flag]?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site_modal modalGerb state_modal">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span>
            </div>
            <div class="mTitle3 text_center"><?=LangHelper::t("ГОСУДАРСТВЕННЫЙ ГЕРБ РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT GERBI", "STATE COAT OF ARMS OF THE REPUBLIC OF UZBEKISTAN"); ?></div>
            <div class="scrollY">
                <div class="textBox">
                    <img src="/uploads/symbols/gerb.svg" alt="">
                    <?=@$symbols[$gerb]?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site_modal modalGimn">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span>
            </div>
            <div class="mTitle3 text_center"><?=LangHelper::t("ГОСУДАРСТВЕННЫЙ ГИМН РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT MADHIYASI", "STATE ANTHEM OF THE REPUBLIC OF UZBEKISTAN"); ?></div>
            <div class="scrollY">
                <div class="textBox">
                    <div class="left">
                        <img src="/uploads/symbols/gimn.svg" alt="">
                        <div>
                            <p><?=nl2br(@$symbols[$gimn_title])?></p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="_gimn"><?=nl2br(@$symbols[$gimn])?></div>
                        <div class="author">
                            <p><?=nl2br(@$symbols[$gimn_author])?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="state_symbolism section-gap">
    <div class="small_container">
        <div class="boxes">
            <div class="item flagM">
                <div class="mTitle2"><?=LangHelper::t("ГОСУДАРСТВЕННЫЙ ФЛАГ РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT BAYROQI", "STATE FLAG OF THE REPUBLIC OF UZBEKISTAN"); ?></div>
                <img src="/uploads/symbols/flag.svg" alt="">
            </div>
            <div class="item gerbM">
                <div class="mTitle2"><?=LangHelper::t("ГОСУДАРСТВЕННЫЙ ГЕРБ РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT GERBI", "STATE COAT OF ARMS OF THE REPUBLIC OF UZBEKISTAN"); ?></div>
                <img src="/uploads/symbols/gerb.svg" alt="">
            </div>
            <div class="item gimnM">
                <div class="mTitle2"><?=LangHelper::t("ГОСУДАРСТВЕННЫЙ ГИМН РЕСПУБЛИКИ УЗБЕКИСТАН", "O'ZBEKISTON RESPUBLIKASI DAVLAT MADHIYASI", "STATE ANTHEM OF THE REPUBLIC OF UZBEKISTAN"); ?></div>
                <img src="/uploads/symbols/gimn.svg" alt="">
            </div>
        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("ГОСУДАРСТВЕННАЯ СИМВОЛИКА", "O’ZBEKISTON DAVLAT TIMSOLLARI", "THE STATE SYMBOLS OF THE REPUBLIC OF UZBEKISTAN"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php
$script = "
$(document).ready(function() {
    
    var show_sym = '{$show_sym}';
    
    $('.flagM').click(function(){
        $('.modalFlag').fadeIn().addClass('shoow')
    }),
    $('.gerbM').click(function(){
        $('.modalGerb').fadeIn().addClass('shoow')
    }),
    $('.gimnM').click(function(){
        $('.modalGimn').fadeIn().addClass('shoow')
    });    
    
    if(show_sym.length>0) $(show_sym).click();
    
});";
$this->registerJs($script, yii\web\View::POS_END);