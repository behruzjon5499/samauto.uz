<?php
use common\helpers\LangHelper;

$text = 'text_'.$lang;
$_title =LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION");
$this->title = $_title;
?>
<div class="simplePage section-gap">
    <div class="small_container">
        <div class="mTitle">
            <?=$_title ?>
        </div>
        <div class="content">
            <img src="/uploads/products/loc-about.jpg">
            <?=@$data->$text ?>
            <div class="text_center">
                <a href="/localization" class="ButtonBox" style="margin-top: 30px;">
                    <span class="ButtonBox-text"><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION"); ?></span>
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
        <span><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>