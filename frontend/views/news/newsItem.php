<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use common\helpers\TextHelper;
use common\helpers\LangHelper;

$this->params['breadcrumbs'][] = $this->title;

$lang = Yii::$app->session->get('lang');
if($lang=='') $lang = 'ru';
$title = 'title_' . $lang;
$text = 'text_' . $lang;

$slider = '';
$nav = '';

$this->title = $news->$title;

$slider = '<div class="item"><img src="/uploads/news/'.@$news->id . '/'. @$news->image .'" alt=""></div>';
$nav = '<div class="item"><div class="wr"><img src="/uploads/news/'.@$news->id . '/thumb/'. @$news->image .'" alt=""></div></div>';

if(isset($news->gallery) && count($news->gallery) ){
    foreach($news->gallery as $item) {

        if ($item->type == 0) {
            $slider .= '<div class="item"><img src="/uploads/news-gallery/'.$item->id . '/'. $item->image .'" alt=""></div>';
            $nav .= '<div class="item"><div class="wr"><img src="/uploads/news-gallery/'.$item->id . '/thumb/'. $item->image .'" alt=""></div></div>';
        } else { // видео
            $slider .= '<div class="item item-video"><iframe style="width: 100%; height: 100%;" src="'.$item->image .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
            $nav .= '<div class="item video-thumb"><div class="wr"><img src="/images/155x85.png" alt=""></div></div>';
        }
    }

} //else{
//} ?>

<div class="newInside section-gap">
    <div class="small_container">
        <div class="mTitle"><?=@$news->$title ?></div>
        <span class="date"><?=date('d.m.Y',@$news->date) ?></span>
        <div class="boxes">
            <div class="left">
                <div class="sliderFor">
                   <?=$slider ?>
                </div>
                <div class="sliderNav">
                    <?=$nav ?>
                </div>
                <?php /* <a href="/news/archive" class="redBtn preload"><span><?=Yii::t('app','АРХИВ НОВОСТЕЙ') ?></span></a> */?>
            </div>
            <div class="right scrollYAll">
                <?=@$news->$text ?>
            </div>
        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/news/archive"><?=Yii::t('app','НОВОСТИ')?></a>
        <span><?=@$news->$title ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>