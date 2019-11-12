<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 22.11.2018
 * Time: 16:58
 */
use common\helpers\LangHelper;
$name = 'name_' . $lang;
$days = 'days_' . $lang;
$doljnost = 'doljnost_' . $lang;

?>

<div class="sliderTeam">

    <?php if($worker) {

        //foreach ($workers as $worker) {

            //$has_childs = count($worker->workers) > 0; ?>

    <div class="item big_item">
        <div class="top">
            <img src="/uploads/company-users/<?=$worker->id . '/'. $worker->image ?>" alt="">
        </div>
        <div class="bottom">
            <div class="names">
                <div class="name"><?=$worker->$name ?></div>
                <div class="position"><?=$worker->$doljnost ?></div>
            </div>
            <?php if($worker->$days!=''){ ?>
                <div class="days">
                    <div class="bold"><?=LangHelper::t("ДНИ ПРИЁМА", "QABUL KUNLARI", "DAYS OF RECEPTION"); ?>:</div>
                    <span><?=$worker->$days ?></span>
                </div>
            <?php } ?>
            <div class="contacts">
                <div class="bold"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?>:</div>
                <a href="#" class="phone"><?=$worker->phone ?></a>
                <a href="#"><?=$worker->email ?></a>
                <a href="#"><?=$worker->site ?></a>
            </div>
            <a href="#" class="ButtonBox js_internal-link _ask_btn"  data-id="<?=$worker->id ?>">
                <span class="ButtonBox-text"><?=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); ?></span>
                <span class="ButtonBox-icon">
                    <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                </span>
            </a>
        </div>
    </div>


        <?php // }
    } ?>

    <?php /*
    <div class="item small_item have_a_child" data-id="11" >
        <div class="wrap" style="transition-delay:.4s">
            <a href="#" class="top _ask_btn">
                <img src="/images/teams/team2.png" alt=""> <span class="add_request">ЗАДАТЬ ВОПРОС</span>
            </a>
            <div class="bottom">
                <div class="names">
                    <div class="name">ГАНИЕВ МУРТАЗО МУСТАФАКУЛОВИЧ 1</div>
                    <div class="position">Генеральный директор</div>
                </div>
                <div class="days">
                    <div class="bold">ДНИ ПРИЁМА:</div><span>В г. Самарканде в Среду 10:00-12:00;</span>
                </div>
                <div class="contacts">
                    <div class="bold">КОНТАКТЫ:</div><a href="#" class="phone">(+998 71) 140 64 64</a>  <a href="#">saminfo@samauto.uz</a>  <a href="#">samauto.uz</a>
                </div>
            </div>
        </div>
    </div>
    <div class="item small_item" data-id="12" >
        <div class="wrap" style="transition-delay:.5s">
            <a href="#" class="top _ask_btn">
                <img src="/images/teams/team1.png" alt=""> <span class="add_request">ЗАДАТЬ ВОПРОС</span>
            </a>
            <div class="bottom">
                <div class="names">
                    <div class="name">ЮЛДАШЕВ УЛМАС ДАВЛАТОВИЧ 1</div>
                    <div class="position">Генеральный директор</div>
                </div>
                <div class="days">
                    <div class="bold">ДНИ ПРИЁМА:</div><span>В г. Самарканде в Среду 10:00-12:00;</span>  <span>в Ташкентском офисе<br>в Понедельник 10:00-12:00;</span>
                </div>
                <div class="contacts">
                    <div class="bold">КОНТАКТЫ:</div><a href="#" class="phone">(+998 71) 140 64 64</a>  <a href="#" class="phone">(+998 71) 140 64 64</a>  <a href="#">saminfo@samauto.uz</a>  <a href="#">samauto.uz</a>
                </div>
            </div>
        </div>
    </div>
    <div class="item small_item" data-id="13">
        <div class="wrap" style="transition-delay:.5s">
            <a href="#" class="top _ask_btn">
                <img src="/images/teams/team3.png" alt=""> <span class="add_request">ЗАДАТЬ ВОПРОС</span>
            </a>
            <div class="bottom">
                <div class="names">
                    <div class="name">ЮЛДАШЕВ УЛМАС ДАВЛАТОВИЧ</div>
                    <div class="position">Генеральный директор</div>
                </div>
                <div class="days">
                    <div class="bold">ДНИ ПРИЁМА:</div><span>В г. Самарканде в Среду 10:00-12:00;</span>  <span>в Ташкентском офисе<br>в Понедельник 10:00-12:00;</span>
                </div>
                <div class="contacts">
                    <div class="bold">КОНТАКТЫ:</div><a href="#" class="phone">(+998 71) 140 64 64</a>  <a href="#" class="phone">(+998 71) 140 64 64</a>  <a href="#">saminfo@samauto.uz</a>  <a href="#">samauto.uz</a>
                </div>
            </div>
        </div>
    </div> */ ?>
</div>