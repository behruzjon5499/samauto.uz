<?php
use common\helpers\LangHelper;

$text = 'text_'.$lang;
$title =LangHelper::t("СЕРВИСНЫЕ ЦЕНТРЫ", "XIZMAT MARKAZLARI", "SERVICE CENTERS");
$this->title = $title;
?>
<div class="simplePage section-gap">
    <div class="small_container">
        <div class="mTitle">
            <?=$title ?>
        </div>
        <div class="content">
            <img src="/uploads/services/centres.jpg">
            <?=@$data->$text ?>
            <div class="text_center">
                <a href="/dillers" class="ButtonBox" style="margin-top: 30px">
                    <span class="ButtonBox-text"><?=LangHelper::t("СЕРВИСНЫЕ ЦЕНТРЫ", "XIZMAT MARKAZLARI", "SERVICE CENTERS"); ?></span>
                    <span class="ButtonBox-icon">
                        <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/services"><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></a>
        <span><?=LangHelper::t("СЕРВИСНЫЕ ЦЕНТРЫ", "XIZMAT MARKAZLARI", "SERVICE CENTERS"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>