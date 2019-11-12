<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 25.10.2018
 * Time: 17:00
 */
 
use common\helpers\LangHelper;

$title = 'title_' . $lang;
$_title =LangHelper::t("ДОКУМЕНТЫ КОМПАНИИ", "KOMPANIYA HUJJATLARI", "COMPANY DOCUMENTS");
$this->title = $_title;
?>

<div class="documents section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?=$_title ?></div>
        <div class="flex_row slider" data-aos="fade-up" data-aos-delay="200">
            <?php
            if($documents) {
                foreach ($documents as $doc) {

                    if($doc->type==0) { // image ?>
                        <div class="item sertificate_item">
                            <a href="/uploads/documents/<?=$doc->id .'/' . $doc->file ?>" class="wrap" data-lightbox="Certificate">
						<span class="img">
							<div>
								<img src="/uploads/documents/<?=$doc->id .'/' . $doc->file ?>" alt="">
							</div>
						</span>
                                <span class="title"><?=$doc->$title ?></span>
                            </a>
                        </div>

                    <?php }elseif($doc->type==1) { // file ?>
                        <div class="item download_item">
                            <a href="" download class="wrap">
        						<span class="img">
        							<img src="/images/886x1265.png" alt="">
        							<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="37.0399mm" height="36.1847mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                         viewBox="0 0 3357.42 3279.9" xmlns:xlink="http://www.w3.org/1999/xlink">
        							 <g>
        							  <metadata/>
        							  <path d="M1986.87 0l-233.51 0.1c-13.79,7.59 -185.24,33.49 -215.97,38.98 -72.87,13.01 -148.39,25.82 -220.03,38.5l-875.7 152.17c-131.22,23.01 -316.57,50.86 -439.76,76.44 -4.02,67.79 -0.46,252.02 -0.46,332.46l3.4 2341.5c11.77,5.3 97.66,18.29 117.6,21.55 283.39,46.25 568.45,102.05 852.6,147.52 240.2,38.44 488.71,89.41 727.64,128.24 20.78,3.38 253.35,2.82 284.37,0.99l0.19 -335.84c106.64,-5 225.48,-0.46 333.34,-0.46l672.55 0.49c81.65,-0.66 251.63,9.84 312.19,-23.99 38.41,-21.46 51.3,-58.68 52.07,-115.9l0.02 -2354.04c0.05,-28.39 -3.37,-47.97 -12.14,-71.93 -8.96,-24.5 -15.55,-35.7 -37.48,-46.56 -68.97,-34.15 -224.79,-26.47 -311.55,-25.17 -327.82,4.9 -679.59,0.68 -1009.09,0.7l-0.28 -305.72zm993.78 913.94l-0.14 -260.87 -533.31 -1.42 0.02 263.93 533.43 -1.63zm-0.07 840.8l0.01 -261.31 -533.54 -1.37 0.02 264 533.51 -1.32zm-0.16 840.42l0.35 -261.24 -533.7 -1.42 -0.06 264.09 533.41 -1.42zm0.11 -1260.77l0.07 -261.29 -533.54 -1.48 0.02 264.13 533.45 -1.36zm0.01 840.67l0.24 -261.51 -533.73 -1.36 0.01 264.31 533.47 -1.44zm-993.3 -1525.16l305.55 0.09 0.04 266.8 -304.21 0.3 -1.41 153.12 305.59 0.05 0.05 266.66 -304.5 0.29 -1.12 153.32 305.59 0.13 0.02 266.55 -304.47 0.32 -1.11 153.18 305.53 0.16 0.05 266.7 -304.52 0.31 -1.05 153.22 305.58 0.06 0 266.65 -304.62 0.3 -1.08 229.29 1260.74 0.05 0.25 -2406.37 -1260.94 -0.52 0.05 229.32zm-1046.95 824.56c-33.47,-133.72 -119.37,-310.92 -163.3,-444.22l-251.38 14.28c7.16,41.42 273.03,565.02 264.38,591.44l-218.36 426.59c-11.77,24.41 -68.15,127.31 -71.01,143.99l247.56 8.8c8.48,-11.33 39.46,-92.88 47.85,-112.06 16.55,-37.8 31.32,-74.19 48.16,-110.76 16.55,-35.92 32.17,-74.65 47.01,-111.83 9.66,-24.2 34.9,-100.53 45.14,-116.23 39.69,135.93 85.91,233.66 139.59,358.49 9.44,21.94 42.17,105.35 51.63,117.14l273.13 18.69c-17.67,-45.04 -126.8,-260.79 -154.89,-314.94l-117.52 -237.22c-61.99,-119.7 -51.76,-61.85 29.21,-235.26 48.85,-104.63 105.07,-211.9 156.03,-317.21 12.94,-26.75 72.4,-144.19 77.45,-161.52 -71.29,0.22 -149.2,7.85 -221.13,12.51 -46.06,2.97 -33.23,-5.47 -59.14,55.1 -47.71,111.55 -124.2,278.52 -159.29,391.8l-6.04 16.36c-4.33,6.89 0.27,1.36 -5.09,6.06z"/>
        							 </g>
        							</svg>
        						</span>
                                <span class="title"><?=$doc->$title ?></span>
                            </a>
                        </div>
                    <?php } ?>



                <?php }
            } ?>

        </div>
    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <span><?=LangHelper::t("ДОКУМЕНТЫ КОМПАНИИ", "KOMPANIYA HUJJATLARI", "COMPANY DOCUMENTS"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>



