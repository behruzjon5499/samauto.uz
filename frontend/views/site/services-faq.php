<?php
use common\helpers\LangHelper;

$text = 'text_'.$lang;
$_title =LangHelper::t("ВОПРОСЫ", "SAVOLLAR", "QUESTIONS");
$this->title = $_title;

?>
<div class="breadPadding mobPadd simplePage">
    <div class="small_container">
        <div class="mTitle">
            <?=$_title ?>
        </div>
        <div class="content">
            <img src="/uploads/services/faq.jpg">
            <?=@$data->$text ?>
        </div>
    </div>
</div>
<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/services"><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></a>
        <span><?=LangHelper::t("ВОПРОСЫ", "SAVOLLAR", "QUESTIONS"); ?></span>
    </div>
</div>