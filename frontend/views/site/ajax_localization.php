<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 09.10.2018
 * Time: 10:47
 */

$title = 'title_'.$lang;
$material = 'material_'.$lang;

?>
<div class="wrap">
    <div class="closeBtn"><span></span><span></span></div>
    <h3 class="mTitle3 text_center"><?=$product->category->$title ?></h3>
    <div class="scrollY">
        <div class="gallery">
            <?php if(isset($product->gallery) && count($product->gallery) >0 ) {
                foreach ($product->gallery as $item) { ?>
                    <div class="item">
                        <img src="/uploads/products/<?= $product->id . '/gallery/' . $item->image ?>" alt="">
                    </div>
                <?php

                    // break; // для теста 1 шт

                }
            } ?>
        </div>
        <div class="options">
            <?php if( $product ) { ?>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("НОМЕР ДЕТАЛИ", "DETAL RAQAMI", "DETAIL NUMBER"); ?></div>
                            <div class="grey"><?=$product->num ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("НАИМЕНОВАНИЕ ДЕТАЛИ", "DETAL NOMI", "THE NAME OF DETAIL"); ?></div>
                            <div class="grey"><?=$product->$title ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("МОДЕЛЬ ТС", "MODEL", "MODEL"); ?></div>
                            <div class="grey"><?=$product->model ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("КОЛИЧЕСТВО НА 1 АВТО", "1-TA AVTOMOBIL UCHUN MIQDOR", "QUANTITY FOR 1 AUTO"); ?></div>
                            <div class="grey"><?=$product->quantity ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("ВЕС, кг", "OG'IRLIGI, kg", "Weight, kg"); ?></div>
                            <div class="grey"><?=$product->mass ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("'МАТЕРИАЛ", "MATERIAL", "MATERIAL"); ?></div>
                            <div class="grey"><?=$product->$material ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("ДЛИНА, мм", "UZUNLIGI, mm", "LENGTH mm"); ?></div>
                            <div class="grey"><?=$product->length ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("ШИРИНА, мм", "KENGLIGI, mm", "WIDTH mm"); ?></div>
                            <div class="grey"><?=$product->width ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("ВЫСОТА, мм", "BALANDLIGI, mm", "HEIGHT, mm"); ?></div>
                            <div class="grey"><?=$product->height ?></div>
                        </div>
                    </div>
                    <div class="option">
                        <div class="caption">
                            <div class="black"><?=LangHelper::t("ТОЛЩИНА, мм", "QALINLIGI, mm", "THICKNESS, mm"); ?></div>
                            <div class="grey"><?=$product->weight ?></div>
                        </div>
                    </div>

            <?php } ?>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.site_modal .closeBtn', function(){
        $(this).parent().parent().parent().removeClass('shoow').delay(500).fadeOut();
    });
    $('.scrollY').overlayScrollbars({});
    $('.partModal .gallery').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
        nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>',
        responsive: [
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 3,
          }
        },
         {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    });

</script>
