<?php
use common\helpers\LangHelper;

$text = 'text_'.$lang;
$title =LangHelper::t("ГАРАНТИЯ", "KAFOLAT", "GUARANTEE");
$this->title = $title;
?>
<div class="simplePage section-gap">
    <div class="small_container">
        <div class="mTitle">
            <?=$title ?>
        </div>
        <div class="content">
            <img src="/uploads/services/warranty.jpg">
            <?=@$data->$text ?>
        </div>
        <div class="dowonload-documents">
            <?php if(isset($data->file) && $data->file!=''){ ?>
            <a href="/uploads/services/<?=$data->file ?>" download class="certificate-box">
                <span class="ttt"><?=LangHelper::t("СКАЧАТЬ", "YUKLAB OLISH", "DOWNLOAD"); ?></span>
                <div title="<?=LangHelper::t("СКАЧАТЬ", "YUKLAB OLISH", "DOWNLOAD"); ?>"><img src="/images/svg/download-button.svg"></div>
            </a>
            <?php }
            if(isset($data->file2) && $data->file2!=''){ ?>
            <a href="/uploads/services/<?=$data->file2 ?>" download class="certificate-box">
                <span class="ttt"><?=LangHelper::t("СКАЧАТЬ", "YUKLAB OLISH", "DOWNLOAD"); ?></span>
                <div title="<?=LangHelper::t("СКАЧАТЬ", "YUKLAB OLISH", "DOWNLOAD"); ?>"><img src="/images/svg/download-button.svg"></div>
            </a>
            <?php } ?>
        </div>
    </div>
</div>
<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/services"><?=LangHelper::t("СЕРВИС", "XIZMAT", "SERVICE"); ?></a>
        <span><?=LangHelper::t("ГАРАНТИЯ", "KAFOLAT", "GUARANTEE"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>