<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 05.12.2018
 * Time: 14:51
 */

use common\helpers\LangHelper;

$this->title =LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "KO'P SO'RALADIGAN SAVOLLAR", "FAQ");
?>

<div class="products section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "KO'P SO'RALADIGAN SAVOLLAR", "FAQ"); ?></div>
        <div class="flex_row">
            <div class="item" data-aos="zoom-in">
                <a href="/about/faq/1" class="wrap">
                    <div class="icon">
                        <img src="/images/faq/01.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("ПРОЦЕСС ПОКУПКИ", "XARID QILISH JARAYONI", "PURCHASE PROCESS"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/about/faq/2" class="wrap preload">
                    <div class="icon">
                        <img src="/images/faq/02.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("ЭКСПЛУАТАЦИЯ И ОБСЛУЖИВАНИЕ", "FOYDALANISH VA TEXNIK XIZMAT", "EXPLOITATION AND SERVICE"); ?></div>
                </a>
            </div>
            <div class="item" data-aos="zoom-in">
                <a href="/about/faq/3" class="wrap preload">
                    <div class="icon">
                        <img src="/images/faq/03.jpg">
                    </div>
                    <div class="mTitle2"><?=LangHelper::t("ДОКУМЕНТАЦИЯ", "HUJJATLAR", "DOCUMENTATION"); ?></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "KO'P SO'RALADIGAN SAVOLLAR", "FAQ"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>