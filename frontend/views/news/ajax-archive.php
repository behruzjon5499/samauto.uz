<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.11.2018
 * Time: 11:14
 */

$title = 'title_' . $lang;
$link = 'link_' . $lang;
?>
    <div class="boxes archive_slider">
        <?php if($news){
            foreach ($news as $item){ ?>

                <a href="/news/<?=$item->$link ?>" class="item preload" style="background-image:url(/uploads/news/<?= $item->id . '/' . $item->image ?>)">
                    <div>
                        <div>
                            <span class="title"><?= $item->$title ?></span>
                            <span class="day"><?= date('d.m.Y', $item->date) ?></span>
                        </div>
                    </div>
                </a>

            <?php }
        } ?>
</div>