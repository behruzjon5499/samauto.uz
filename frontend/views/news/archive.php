<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.11.2018
 * Time: 11:14
 */

use common\helpers\LangHelper;

$title = 'title_' . $lang;
$link = 'link_' . $lang;
$this->title =LangHelper::t("АРХИВ НОВОСТЕЙ", "YANGILIKLAR ARXIVI", "NEWS ARCHIVE");
?>

<div class="archive section-gap" data-aos="fade-up">
    <div class="small_container">
        <div class="mTitle"><?=LangHelper::t("АРХИВ НОВОСТЕЙ", "YANGILIKLAR ARXIVI", "NEWS ARCHIVE"); ?></div>
        <div class="_year">
            <?php if($years_list) {
                $count_years = count($years_list);
                $i=0;
                $class = '';
                foreach ($years_list as $ylist) {
                    $i++;
                    if($i==$count_years) $class = 'current_year'; ?>
                    <a href="#" class="archive-year <?=$class ?>" data-year="<?=$ylist->year_list ?>"><?=$ylist->year_list ?> <?=LangHelper::t("г.", "й", "y"); ?></a>
                <?php }
            } ?>
        </div>
    </div>
    <div class="transition-height">
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
    </div>
</div>

<div data-aos="fade-up">

<div class="site_bread">
    <div class="centerBox"><a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>  <a href="/news"><?=LangHelper::t("НОВОСТИ", "YANGILIKLAR", "NEWS"); ?></a>  <span><?=LangHelper::t("АРХИВ НОВОСТЕЙ", "YANGILIKLAR ARXIVI", "NEWS ARCHIVE"); ?></span></div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php
$server_error =LangHelper::t("Сервер недоступен! Повторите попытку позже.", "Server mavjud emas! Keyinroq qayta urinib ko‘ring.", "Server is not available! Please try again later.");

$script = " 
$('document').ready(function(){
        
	$('.archive-year').click(function(e){
	   
        e.preventDefault();
                
        $('.archive-year').removeClass('current_year');
        $(this).addClass('current_year');
        
        year = $(this).data('year');

        $('.archive .boxes .item').css({
          'transition': '.3s',
          'transform': 'scale(.5)',
          'opacity': '0'
        });
        
        console.log(year);
        // return false;
       
       setTimeout(function(){
          
          $.ajax({
            type: 'post',
            url: '/news/get-archive',
            data: 'year='+year+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                if(data.status==1) {
                
                $('.boxes.archive_slider').remove();
                    $('.transition-height').append(data.html);
                    // sliderArchive();
               
                  setTimeout(function(){
                    $('.archive .boxes .item').css({
                      'transition': '.3s',
                      'transform': 'scale(1)',
                      'opacity': '1',
                      'position': 'relative'
                    });
                    
                  }, 200)
                                
                }
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
         });  

       }, 400);

	});
	
});";
$this->registerJs($script, yii\web\View::POS_END);