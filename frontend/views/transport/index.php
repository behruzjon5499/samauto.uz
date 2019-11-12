<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.11.2018
 * Time: 16:05
 */

use common\helpers\LangHelper;
 
$title = 'title_'.$lang;
$_title =LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES");
$this->title = $_title;
?>

<div class="products section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="flex_row">
            <div class="item" data-aos="zoom-in">
                <a href="/transport/bus" class="wrap">
                    <div class="icon">
                        <img src="/images/transport/bus.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("АВТОБУСЫ", "AVTOBUSLAR", "BUSES"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/transport/trucks" class="wrap preload">
                    <div class="icon">
                        <img src="/images/transport/truck.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("ГРУЗОВЫЕ АВТОМОБИЛИ", "YUK MASHINALARI", "TRUCKS"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/transport/special" class="wrap preload">
                    <div class="icon">
                        <img src="/images/transport/special.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL BODY TRUCKS"); ?></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>