<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.10.2018
 * Time: 17:09
 */
?>
<?php


if($companies) {

    //echo '<pre>';print_r($companies); exit;

    $title = 'title_'.$lang;
    $text = 'text_'.$lang;
    $name = 'name_'.$lang;
    $firstname = 'firstname_'.$lang;
    $secondname = 'secondname_'.$lang;
    $lastname = 'lastname_'.$lang;

    foreach ($companies as $company) { // компании
        ?>
        <div class="_company">
            <div class="head flex_row__cen">
                <div class="logo"><img src="/uploads/companies/<?=$company->id . '/' . $company->image ?>" alt=""></div>
                <div class="text">
                    <div class="_title"><?=$company->$name ?></div>
                    <p><?=\common\helpers\TextHelper::trim($company->$text,200) ?></p>
                    <div class="flex_row_beet item">
                        <div>
                            <span class="normal"><?=@$company->director->doljnost->$name ?>:</span>
                            <span class="bold uppercase"><?=@$company->director->$firstname . ' ' . @$company->director->$secondname . ' ' . @$company->director->$lastname ?></span>
                        </div>
                        <div class="red">
                            <div><?=@$company->director->phone ?></div>
                            <div><?=@$company->director->email ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="caption flex_row">
                <div class="left">
                    <?php if(isset($company->managers)) { // менеджеры

                        foreach ($company->managers as $manager) { ?>

                            <div class="item">
                                <div class="bold"><?=$manager->$firstname . ' ' . $manager->$secondname ?></div>
                                <div class="normal"><?=$manager->doljnost->$name ?></div>
                                <div class="red">
                                    <div><?=$manager->phone ?></div>
                                    <div><?=$manager->email ?></div>
                                </div>
                            </div>

                        <?php }
                    }
                    ?>

                </div>
                <div class="right">
                    <div class="mini-slider">
                    <?php if(isset($company->gallery)) { // галерея

                        foreach ($company->gallery as $gallery) { ?>
                            <img src="/uploads/companies/<?=$company->id . '/gallery/' . $gallery->image ?>" alt="">
                        <?php }
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>

    <?php }
}
