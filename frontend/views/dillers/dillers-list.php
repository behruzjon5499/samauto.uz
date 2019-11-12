<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 09.11.2018
 * Time: 10:19
 */
 
use common\helpers\LangHelper;

$text = 'text_'.$lang;
$title = 'title_'.$lang;
$address = 'address_'.$lang;
$name = 'name_'.$lang;
//$region = '';
$this->title =LangHelper::t("ДИЛЕРЫ", "DILERLAR", "DEALERS");
?>

<?php if($dillers){ ?>


<div class="dillerList section-gap">
    <div class="small_container">
        <div class="dillerListSlider" data-aos="fade-up">

        <?php  //$region = $dillers[0]->region->$name;

            foreach($dillers as $diller){ ?>
                <a href="/dillers/<?=$diller->id ?>/service" class="item preload">
                    <div class="wrap">
                        <div class="title"><?=$diller->$title ?></div>
                        <?php if($diller->image != ''){ ?>
                            <div class="img" style="background-image: url(/uploads/dillers/<?=$diller->id . '/' . $diller->image ?>);"></div>
                        <?php } else { ?>
                            <div class="img" style="background-image: url(/images/placeholder.jpg);"></div>
                        <?php } ?>
                        <div class="textBox">
                            <div class="desc">
                                <?=$diller->$text ?>
                            </div>
                            <div class="address"><?=$diller->$address ?></div>
                            <div class="phone">
                                <?=$diller->phone ?>
                            </div>
                            <div class="shares">
                                <span><?=$diller->email ?></span>
                                <span><?=$diller->site ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>
</div>

<?php } else { ?>

    <div class="no-content section-gap" data-aos="zoom-in">
        <div class="small_container">
            <div class="no-content--wrap">
                <img src="/images/logo.svg" alt="">
                <div class="text"><span>На это странице ничего не найдено!</span></div>
            </div>
        </div>
    </div>

<?php } ?>


<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/dillers" class="preload"><?=LangHelper::t("ДИЛЕРСКАЯ СЕТЬ", "DILERLIK TARMOG'I", "DEALER NETWORK"); ?></a>
        <span><?=$region ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>