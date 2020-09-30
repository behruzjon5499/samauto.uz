<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 30.11.2018
 * Time: 16:05
 */
use common\helpers\LangHelper;

$title = 'title_'.$lang;
$_title =LangHelper::t("ПИКАПЫ", "PIKAPLAR", "PICKUPS");
$this->title = $_title;
?>

<div class="cars-grid section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="slider_parts">
            <div class="wrapper">
                <?php if($transport){

                    foreach ($transport as $auto){ ?>

                        <div class="item" data-aos="zoom-in" data-aos-delay="200">
                            <a href="/transport/pickupitem/<?=$auto->id ?>" class="caption preload">
                                <img src="/uploads/transport/<?=$auto->id .'/thumb/'.$auto->image ?>">
                                <span><?=$auto->$title ?></span>
                            </a>
                        </div>

                    <?php }

                } ?>
            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up">

    <div class="site_bread">
        <div class="centerBox">
            <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <a href="/transport" class="preload"><?=LangHelper::t("КАТЕГОРИИ МАШИН", "MASHINA KATEGORIYALARI", "MACHINE CATEGORIES"); ?></a>
            <span><?=LangHelper::t("ПИКАПЫ", "PIKAPLAR", "PICKUPS"); ?></span>
        </div>
    </div>

    <?= $this->render('../layouts/_footer') ?>