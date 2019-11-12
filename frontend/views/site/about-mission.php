<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.10.2018
 * Time: 16:03
 */

use common\helpers\LangHelper;

$title = 'title_'.$lang;
$text = 'text_'.$lang;
$_title =LangHelper::t("МИССИЯ КОМПАНИИ", "KOMPANIYANING MISSIYASI", "COMPANY'S MISSION");
$this->title = $_title;
?>

<div class="missionInside section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="boxes" data-aos="fade-up" data-aos-delay="200">
            <div class="_title">
                <div class="num"><?=$mission->num ?></div>
                <span><?=$mission->$title ?></span>
            </div>
            <div class="textBox">
               <?php
               foreach($data as $item){ ?>

                    <div>
                        <p><strong><?=$item[$title] ?> </strong></p> <br>
                        <p>
                            <?=nl2br($item[$text]) ?>
                        </p>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <a href="/about/missions" class="preload"><?=LangHelper::t("МИССИЯ КОМПАНИИ", "KOMPANIYANING MISSIYASI", "COMPANY'S MISSION"); ?></a>
        <span><?=$mission->$title ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>