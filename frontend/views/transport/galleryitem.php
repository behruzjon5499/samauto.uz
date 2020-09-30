<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 03.12.2018
 * Time: 10:28
 */

use frontend\assets\IrbisAsset;

IrbisAsset::register($this);

?>

<style>

    .col-md-3 {
        padding: 0 0;
    }

    .col-md-3 img {
        width: 100%;
        height: 250px;
    }
</style>



<div class="transport-page section-gap" >
    <div class="small_container" style="width: 100% !important;">
        <div data-aos="fade-up" data-aos-delay="200">
            <div class="gallery spectre-gallery">
                <div class="wrap">

<?php foreach($gallery as $g):?>
                <div class="item" style="padding: 0 0 !important;">
                    <div>
                        <img src="/uploads/irbis-gallery/<?=$g->photo?>" style="width: 100%; height: 250px;" alt="">
                        <a href="/uploads/irbis-gallery/<?=$g->photo?>"
                           data-lightbox="gallery" class="overlayBlack">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                 width="2.3098mm"
                                 height="2.28mm" version="1.1"
                                 style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"
                                 viewBox="0 0 17.24 17.02">
                                            <g>
                                                <g>
                                                    <path d="M-0 6.9c0,1.33 0.14,2.27 0.7,3.37 0.46,0.91 1.1,1.82 1.92,2.45 0.97,0.75 1.73,1.14 2.96,1.45 0.27,0.07 0.46,0.09 0.77,0.13 1.54,0.21 2.85,-0.13 4.19,-0.8l0.9 -0.52 3.01 3.71c0.72,0.76 1.11,0.06 1.83,-0.65 0.21,-0.22 0.98,-0.87 0.98,-1.15 0,-0.62 -0.86,-1.1 -1.39,-1.56 -0.65,-0.57 -1.44,-1.17 -2.13,-1.75 -0.09,-0.08 -0.17,-0.13 -0.27,-0.21 -0.13,-0.11 -0.12,-0.12 -0.28,-0.21 0.04,-0.15 0.12,-0.26 0.2,-0.39 0.09,-0.14 0.14,-0.25 0.21,-0.39 0.91,-1.82 0.97,-3.74 0.32,-5.66 -0.08,-0.25 -0.17,-0.4 -0.26,-0.63l-0.3 -0.56c-0.06,-0.1 -0.12,-0.17 -0.18,-0.27l-0.36 -0.5c-0.15,-0.21 -0.65,-0.75 -0.85,-0.91 -0.85,-0.65 -0.8,-0.71 -1.87,-1.22 -0.37,-0.18 -0.89,-0.33 -1.32,-0.44 -1.44,-0.35 -3.15,-0.19 -4.48,0.41 -1.61,0.72 -2.6,1.72 -3.44,3.17l-0.41 0.89c-0.08,0.22 -0.15,0.45 -0.22,0.68 -0.12,0.41 -0.23,1.05 -0.23,1.56zm7.16 -5.46c3.14,0 5.68,2.54 5.68,5.68 0,3.13 -2.54,5.68 -5.68,5.68 -3.14,0 -5.68,-2.54 -5.68,-5.68 0,-3.14 2.54,-5.68 5.68,-5.68z"></path>
                                                    <path d="M3.68 7.82c-0.01,-0.47 0.01,-0.78 0.14,-1.23 0.55,-1.93 1.81,-3.01 3.79,-3.23 0.27,0 0.43,-0.03 0.49,-0.09 0.36,-0.61 0.09,-0.9 -0.81,-0.88 -2.41,0.03 -3.94,1.31 -4.6,3.84 -0.09,0.33 -0.23,0.97 -0.08,1.36 0.11,0.29 0.63,0.48 0.89,0.42 0.1,-0.02 0.16,-0.08 0.18,-0.19z"></path>
                                                </g>
                                            </g>
                                        </svg>
                        </a>

                    </div>
                </div>

<?php endforeach;?>
            </div>
        </div>
    </div>
</div>
</div>


<?= $this->render('../layouts/_footer') ?>

