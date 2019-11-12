<?php
use common\helpers\LangHelper;

$_title =LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE");
$this->title = $_title;
?>

<div class="mission section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="boxes" data-aos="fade-up" data-aos-delay="200">
            <div class="col-6">
                <a href="/services/warranty" class="item">
                    <div class="left">
                        <div class="num"></div>
                        <span><?=LangHelper::t("ГАРАНТИЯ", "KAFOLAT", "GUARANTEE"); ?></span>
                    </div>
                    <div class="right">
                        <img src="/images/service/warranty.jpg" alt="">
                    </div>
                </a>

                <a href="/services/spare-parts" class="item">
                    <div class="right">
                        <img src="/images/service/spare_parts.jpg" alt="">
                    </div>
                    <div class="left">
                        <div class="num"></div>
                        <span><?=LangHelper::t("ЗАПАСНЫЕ ЧАСТИ", "EHTIYOT QISMLAR", "SPARE PARTS"); ?></span>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="/services/centres" class="item">
                    <div class="left">
                        <div class="num"></div>
                        <span><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></span>
                    </div>
                    <div class="right">
                        <img src="/images/service/service.jpg" alt="">
                    </div>
                </a>
                <a href="/about/faq/2" class="item">
                    <div class="right">
                        <img src="/images/service/faq.jpg" alt="">
                    </div>
                    <div class="left">
                        <div class="num"></div>
                        <span><?=LangHelper::t("ВОПРОСЫ", "SAVOLLAR", "QUESTIONS"); ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>