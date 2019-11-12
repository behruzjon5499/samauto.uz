<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 22.11.2018
 * Time: 17:04
 */


$title = 'title_' . $lang;
$name = 'name_' . $lang;
$text = 'text_' . $lang;
$days = 'days_' . $lang;
$doljnost = 'doljnost_' . $lang;

?>

<?php if($workers) { ?>

<div class="levelOne levelTwo">

    <div class="item big_item main">
        <a href="#" class="top">
            <img src="/uploads/company-users/<?=$workers->id . '/'. $workers->image ?>" alt=""> <span class="_ask_btn" data-id="<?=$workers->id ?>"><?=LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></span>
        </a>
        <div class="bottom">
            <div class="names">
                <div class="name"><?=$workers->$name ?></div>
                <div class="position"><?=$workers->$doljnost ?></div>
            </div>
            <div class="days">
                <div class="bold"><?=LangHelper::t("ДНИ ПРИЁМА", "QABUL KUNLARI", "DAYS OF RECEPTION"); ?>:</div><span><?=$workers->$days ?></span>
            </div>
            <div class="contacts">
                <div class="bold"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?>:</div><a href="#" class="phone"><?=$workers->phone ?></a>
                <a href="#"><?=$workers->email ?></a>
                <a href="#"><?=$workers->site ?></a>
            </div>
            <button style="margin-top: 10px" class="redBtn _ask_all_btn" data-id="<?=$workers->id ?>"><span><?=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); ?></span></button>
        </div>
    </div>

    <div class="sliderTeam">

        <?php

            foreach ($workers->workers as $worker) {

                $has_childs = count( $worker->workers ) > 0;

            ?>

                <div class="item small_item <?=$has_childs ? 'have_a_child' : '' ?>" data-id="<?=$has_childs ? $worker->id : 0 ?>">
                    <div class="wrap">
                        <a href="#" class="top">
                            <img src="/uploads/company-users/<?=$worker->id . '/'. $worker->image ?>" alt=""> <span class="add_request _ask_btn" data-id="<?=$worker->id ?>"><?=LangHelper::t("ЗАДАТЬ ВОПРОС", "SAVOL BERMOQ", "ASK A QUESTION"); ?></span>
                        </a>
                        <div class="bottom">
                            <div class="names">
                                <div class="name"><?=$worker->$name ?></div>
                                <div class="position"><?=$worker->$doljnost ?></div>
                            </div>
                            <div class="days">
                                <div class="bold"><?=LangHelper::t("ДНИ ПРИЁМА", "QABUL KUNLARI", "DAYS OF RECEPTION"); ?>:</div>
                                <span><?=$worker->$days ?></span>
                            </div>
                            <div class="contacts">
                                <div class="bold"><?=LangHelper::t("КОНТАКТЫ", "ALOQA", "CONTACTS"); ?>:</div>
                                <a href="#" class="phone"><?=$worker->phone ?></a>
                                <a href="#"><?=$worker->email ?></a>
                                <a href="#"><?=$worker->site ?></a>
                            </div>
                            <button class="redBtn _ask_all_btn" data-id="<?=$worker->id ?>"><span><?=LangHelper::t("ЗАПИСАТЬСЯ НА ПРИЁМ", "QABULGA YOZILISH", "MAKE AN APPOINTMENT"); ?></span></button>
                        </div>
                    </div>
                </div>

            <?php } ?>

    </div>

    <?php } ?>

</div>

