<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 05.12.2018
 * Time: 15:04
 */

use common\helpers\LangHelper;

$title = 'title_'.$lang;
$text = 'text_'.$lang;
$_title =LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "KO'P SO'RALADIGAN SAVOLLAR", "FAQ");
$this->title = $_title;

?>

    <div class="site_modal modalAnswer">
        <div class="overlayClose"></div>
        <div class="flex_row_cen_cen">
            <div class="wrap">
                <div class="closeBtn"><span></span><span></span>
                </div>
                <div class="quest"></div>
                <div class="light_text"></div>
            </div>
        </div>
    </div>

    <div class="faqInside section-gap">
        <div class="small_container">
            <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
            <div class="mTitle2" data-aos="fade-right"><?=$type ?></div>
            <div class="questions" data-aos="fade-right">

                <?php if($models) {
                    foreach ($models as $model) { ?>
                        <div class="item">
                            <div class="head"><?=$model->$title ?>
                                <div class="arrow">
                                    <img src="/images/svg/down-chevron.svg">
                                </div>
                            </div>
                            <div class="body" style="display: none;">
                                <div><p><?=$model->$text ?></p></div>
                            </div>
                        </div>
                    <?php }
                }  ?>

                <?php /* if($models) {
                    foreach ($models as $model) { ?>
                        <a href="#" data-answer='<?=$model->$text ?>'><?=$model->$title ?></a>
                    <?php }
                }  */ ?>
            </div>
        </div>
    </div>

    <div data-aos="fade-up" data-aos-delay="300">

    <div class="site_bread">
        <div class="centerBox"><a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <a href="/about"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
            <a href="/about/faq"><?=LangHelper::t("ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ", "KO'P SO'RALADIGAN SAVOLLAR", "FAQ"); ?></a>
            <span><?=$type ?></span>
        </div>
    </div>

    <?= $this->render('../layouts/_footer') ?>

<?php $script = "$('document').ready(function(){
    $('.questions a').on('click',function(t){
        t.preventDefault();
        var e=$(this).text()
        a=$(this).attr('data-answer');
        $('.modalAnswer').find('.quest').text(e);
        $('.modalAnswer').find('.light_text').text(a);
        $('.modalAnswer').fadeIn().addClass('shoow')
    })
});";

$this->registerJs($script, yii\web\View::POS_END);
