<?php
use common\helpers\LangHelper;

$title = 'title_' . $lang;
$link = 'link_' . $lang;

$_title =LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION");
$this->title = $_title;
?>

<div class="localization section-gap">
    <div class="small_container">
        <div class="mTitle"><?=$_title ?></div>

        <?= $this->render('search-form') ?>

        <div class="lists flex_row">
            <?php


            /*echo '<pre>';
            print_r($categories);
            echo '</pre>';*/


            if($categories){ ?>

            <ul>
                <li><?=LangHelper::t("ЭЛЕКТРИКА", "ELEKTRIKA", "ELECTRICS"); ?></li>
                <?php foreach ($categories as $category) {
                    if ($category->parent_id != 1) continue; // пропуск категории
                    ?>
                    <li><a href="/localization/<?=@$category->parent->$link .'/'. $category->$link ?>" class="preload"><?=$category->$title ?></a></li>
                <?php } ?>

            </ul>
            <ul>
                <li><?=LangHelper::t("КУЗОВ", "KUZOV", "BODY"); ?></li>
                <?php foreach ($categories as $category) {
                    if ($category->parent_id != 2) continue; // пропуск категории
                    ?>
                    <li><a href="/localization/<?=@$category->parent->$link .'/'. $category->$link ?>" class="preload"><?=$category->$title ?></a></li>
                <?php } ?>

            </ul>
            <ul>
                <li><?=LangHelper::t("ДВИГАТЕЛЬ", "DVIGATEL", "ENGINE"); ?></li>
                <?php foreach ($categories as $category) {
                if ($category->parent_id != 3) continue; // пропуск категории
                ?>
                <li><a href="/localization/<?=@$category->parent->$link .'/'. $category->$link ?>" class="preload"><?=$category->$title ?></a></li>
                <?php } ?>

            </ul>
            <ul>
                <li><?=LangHelper::t("САЛОН", "SALON", "SALON"); ?></li>
                <?php foreach ($categories as $category) {
                if ($category->parent_id != 4) continue; // пропуск категории
                ?>
                <li><a href="/localization/<?=@$category->parent->$link .'/'. $category->$link ?>" class="preload"><?=$category->$title ?></a></li>
                <?php } ?>

            </ul>
            <?php } ?>

        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>