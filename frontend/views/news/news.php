<?php
use common\helpers\LangHelper;

$title = 'title_' . $lang;
$link = 'link_' . $lang;
$this->title =LangHelper::t("НОВОСТИ", "YANGILIKLAR", "NEWS");
?>

<section class="section--4 news-design newsPage">
    <div class="row">
        <?php if($news) {
            $i = 0;
            foreach ($news as $item) { ?>
                <a href="/news/<?=$item->$link ?>" class="item">
                    <div>
                        <div style="background-image: url(/uploads/news/<?=$item->id .'/' . $item->image ?>);"></div>
                    </div>
                    <span class="caption">
                        <span class="title"><?=$item->$title ?></span>
                        <span class="day"><?=date('d.m.Y',$item->date ) ?></span>
                    </span>
                </a>
            <?php }
        } ?>
    </div>
</section>