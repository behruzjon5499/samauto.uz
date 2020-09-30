<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.10.2018
 * Time: 15:59
 */
 
use common\helpers\LangHelper;
 
$title = 'title_'.$lang;
$_title =LangHelper::t("МИССИЯ КОМПАНИИ", "KOMPANIYANING VAZIFASI", "COMPANY'S MISSION");
$this->title = $_title;
?>

<div class="mission section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="boxes" data-aos="fade-up" data-aos-delay="200">

            <?php if($missions) {
                $i=0;
                foreach ($missions as $mission) {
                    if($i==0 || $i==2){ ?>
                        <div class="col-6">
                    <?php } ?>

                    <?php if($i==1||$i==3){ ?>
                        <a href="/about/mission/<?=$mission->id ?>" class="item">
                            <div class="right">
                                <img src="/uploads/missions/<?=$mission->id . '/' . $mission->file ?>" alt="">
                            </div>
                            <div class="left">
                                <div class="num"><?=$mission->num ?></div>
                                <span><?=$mission->$title ?></span>
                            </div>
                        </a>
                    <?php }else{ ?>
                        <a href="/about/mission/<?=$mission->id ?>" class="item">
                            <div class="left">
                                <div class="num"><?=$mission->num ?></div>
                                <span><?=$mission->$title ?></span>
                            </div>
                            <div class="right">
                                <img src="/uploads/missions/<?=$mission->id . '/' . $mission->file ?>" alt="">
                            </div>
                        </a>
                    <?php } ?>
                    
                        

                    <?php if($i==1||$i==3){ ?>
                        </div>
                    <?php }
                    $i++;
                }
            } ?>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <span><?=LangHelper::t("МИССИЯ КОМПАНИИ", "KOMPANIYANING VAZIFASI", "COMPANY'S MISSION"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>