<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 23.08.2018
 * Time: 16:43
 */
use common\helpers\LangHelper;

$lang = Yii::$app->session->get('lang');
if($lang=='') $lang = 'ru';

$about = 'about_'.$lang;
$about2 = 'about2_'.$lang;
$this->title =LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY");

?>
    <div class="mission about_page section-gap">
        <div class="small_container">
            <div class="mTitle" data-aos="fade-right"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></div>
            <div class="boxes" style="flex-wrap: wrap" data-aos="fade-up" data-aos-delay="200">
                <!-- ОБЩАЯ ИНФОРМАЦИЯ О ЗАВОДЕ -->
                <div class="col-6">
                    <a href="/about/missions" class="item">
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("ОБЩАЯ ИНФОРМАЦИЯ О ЗАВОДЕ", "UMUMIY ZAVOD MA'LUMOTI", "GENERAL INFORMATION ABOUT FACTORY"); ?></span>
                        </div>
                        <div class="right">
                            <img src="/images/about/about.jpg" alt="">
                        </div>
                    </a>
                </div>
                <!-- ИСТОРИЯ -->
                <div class="col-6">
                    <a href="/about/history" class="item">
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("ИСТОРИЯ КОМПАНИИ", "KOMPANIYA TARIXI", "HISTORY OF THE COMPANY"); ?></span>
                        </div>
                        <div class="right">
                            <img src="/images/about/histore.jpg" alt="">
                        </div>
                    </a>
                </div>
                <!-- РУКОВОДСТВО -->
                <div class="col-6">
                    <a href="/about/leadership" class="item">
                        <div class="right">
                            <img src="/images/about/leadership.jpg" alt="">
                        </div>
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("РУКОВОДСТВО", "KOMPANIYA BOSHQARUVI", "COMPANY MANAGEMENT"); ?></span>
                        </div>
                    </a>
                </div>
                <!-- ДОКУМЕНТЫ КОМПАНИИ -->
                <div class="col-6">
                    <a href="/about/documents" class="item">
                        <div class="right">
                            <img src="/images/about/documents.jpg" alt="">
                        </div>
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("ДОКУМЕНТЫ КОМПАНИИ", "KOMPANIYA HUJJATLARI", "COMPANY DOCUMENTS"); ?></span>
                        </div>
                    </a>
                </div>
                <!-- КАРЬЕРА -->
                <div class="col-6">
                    <a href="/about/vacancy" class="item">
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("КАРЬЕРА", "KARYERA", "CAREER"); ?></span>
                        </div>
                        <div class="right">
                            <img src="/images/about/career.jpg" alt="">
                        </div>
                    </a>
                </div>
                <!-- КОНТАКТНАЯ ИНФОРМАЦИЯ -->
                <div class="col-6">
                    <a href="/contacts" class="item">
                        <div class="left">
                            <div class="num"></div>
                            <span><?=LangHelper::t("КОНТАКТНАЯ ИНФОРМАЦИЯ", "ALOQA", "CONTACTS"); ?></span>
                        </div>
                        <div class="right">
                            <img src="/images/about/contacts.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>

    <div class="site_bread">
        <div class="centerBox">
            <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
            <span><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></span>
        </div>
    </div>

    <?= $this->render('../layouts/_footer') ?>


<?php
/*$script = "
$(document).ready(function() {

});";
$this->registerJs($script, yii\web\View::POS_END);*/

