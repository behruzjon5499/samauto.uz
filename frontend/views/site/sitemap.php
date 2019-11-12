<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.03.2019
 * Time: 16:42
 */
 
use common\helpers\LangHelper;
?>

<div class="siteMap mainMrTop mobPadd">
    <div class="medium_container">
        <ul id="threeView" class="treeview-gray treeview">
            <li><a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a></li>
            <li class="expandable"><div class="hitarea closed-hitarea expandable-hitarea"></div>
                <span><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></span>
                <ul>
                    <li><a href="/about/missions"><?=LangHelper::t("МИССИЯ КОМПАНИИ", "KOMPANIYANING MISSIYASI", "COMPANY'S MISSION"); ?></a></li>
                    <li><a href="/about/history"><?=LangHelper::t("ИСТОРИЯ", "TARIXI", "HISTORY"); ?></a></li>
                    <li><a href="/about/leadership"><?=LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARMASI", "COMPANY MANAGEMENT"); ?></a></li>
                    <li><a href="/about/documents"><?=LangHelper::t("ДОКУМЕНТЫ КОМПАНИИ", "KOMPANIYA HUJJATLARI", "COMPANY DOCUMENTS"); ?></a></li>
                    <li><a href="/about/vacancy"><?=LangHelper::t("КАРЬЕРА", "KARYERA", "CAREER"); ?></a></li>
                    <li class="last"><a href="/contacts"><?=LangHelper::t("КОНТАКТНАЯ ИНФОРМАЦИЯ", "ALOQA", "CONTACTS"); ?></a></li>
                </ul>
            </li>
            <li><a href="/transport/bus"><?=LangHelper::t("АВТОБУСЫ", "AVTOBUSLAR", "BUSES"); ?></a></li>
            <li><a href="/transport/trucks"><?=LangHelper::t("ГРУЗОВЫЕ АВТОМОБИЛИ", "YUK MASHINALARI", "TRUCKS"); ?></a></li>
            <li><a href="/transport/special"><?=LangHelper::t("СПЕЦ АВТОМОБИЛИ", "MAXSUS AVTOULOVLAR", "SPECIAL CARS"); ?></a></li>
            <li><a href="/dillers"><?=LangHelper::t("ДИЛЕРЫ", "DILERLAR", "DEALERS"); ?></a></li>
            <li><a href="/dillers"><?=LangHelper::t("ЗАПЧАСТИ", "EHTIYOT QISMLAR", "SPARE PARTS"); ?></a></li>
            <li><a href="/localization"><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "JOYLASHTIRISH", "LOCALIZATION"); ?></a></li>
            <li class="expandable"><div class="hitarea expandable-hitarea"></div>
                <span><?=LangHelper::t("НОВОСТИ", "YANGILIKLAR", "NEWS"); ?></span>
                <ul>
                    <li class="last"><a href="/news/archive"><?=LangHelper::t("АРХИВ НОВОСТЕЙ", "YANGILIKLAR ARXIVI", "NEWS ARCHIVE"); ?></a></li>
                </ul>
            </li>
            <li class="expandable"><div class="hitarea expandable-hitarea"></div>
                <span><?=LangHelper::t("FAQ", "FAQ", "FAQ"); ?></span>
                <ul>
                    <li><a href="/about/faq/1"><?=LangHelper::t("ПРОЦЕСС ПОКУПКИ", "XARID QILISH JARAYONI", "PURCHASE PROCESS"); ?></a></li>
                    <li><a href="/about/faq/2"><?=LangHelper::t("ЭКСПЛУАТАЦИЯ И ОБСЛУЖИВАНИЕ", "FOYDALANISH VA TEXNIK XIZMAT", "EXPLOITATION AND SERVICE"); ?></a></li>
                    <li class="last"><a href="/about/faq/3"><?=LangHelper::t("ДОКУМЕНТАЦИЯ", "HUJJATLAR", "DOCUMENTATION"); ?></a></li>
                </ul>
            </li>
            <li><a href="/contacts"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?></a></li>
        </ul>
    </div>
</div>