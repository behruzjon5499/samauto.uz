<?php
use common\helpers\LangHelper;

$title = 'title_' .$lang;
$_title =LangHelper::t("АКЦИИ", "MA'LUMOTLAR", "PROMOTIONS");
$this->title = $_title;

?>
<div class="stocks section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="boxes">
            <div class="wrap">
                <?php if($actions) {
                    foreach ($actions as $action) {
                        ?>

                        <a href="/action-item/<?=$action->link ?>" class="item" data-aos="fade-up">
                            <img src="/uploads/actions/<?=$action->id .'/'. $action->image ?>">
                            <div class="caption">
                                <div class="title"><?=$action->$title ?></div>
                                <div class="end-date" data-date="<?=date('Y/m/d',$action->date_end) /*2019/03/25*/ ?>"></div>
                            </div>
                        </a>

                    <?php }
                } ?>


            </div>
        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("АКЦИИ", "MA'LUMOTLAR", "PROMOTIONS"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>