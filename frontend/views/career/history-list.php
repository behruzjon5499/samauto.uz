<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$this->title = LangHelper::t('Истории наших успехов', 'Bizning muvaffaqiyatlarimiz', 'Our success stories' );

$title = 'title_'.$lang;
$descr = 'descr_'.$lang;
$noImage = 'employee.jpg';

?>

﻿    <div class="mission kareergoals about_page section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $this->title?></div>
        <div class="boxes" style="flex-wrap: wrap" data-aos="fade-up" data-aos-delay="200">

            <section class="last-section section _normalScroll">
                <div class="scroll">
                    <section class="news-design" style="height: 80vh;">
                        <div class="row">
                            <?php foreach ($histories as $history):?>
                            <a href="history?id=<?= $history->id?>" class="item" data-aos="zoom-in">
                                <div>
                                    <div style="background-image: url(/uploads/career/history/<?= $history->preview_img?>); background-size: cover;"></div>
                                </div>
                                <span class="goal-info">
                                         <span class="title"><?= $history->$title?></span>
                                         <span class="title">
                                             <p class="goal-text"><?= $history->$descr?></p>
                                         </span>
                                        </span>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </section>
                </div>
            </section>




        </div>
    </div>
</div>

    <div class="site_bread">
        <div class="centerBox">
            <a href="https://samauto.uz/"><?= LangHelper::t('ГЛАВНАЯ', 'BOSH SAHIFA', 'HOME' )?></a>
            <span><?= $this->title?></span>
        </div>
    </div>

    <?= $this->render('../layouts/_footer') ?>

    <?php /** @var \yii\web\View $this */
    $js = <<<JS
 $('body').on('click', '._ask_btn', function(e){
        e.preventDefault();
        $('#add_question').val($(this).data('id'));
        $('.ask_a_question').fadeIn().addClass('shoow');
        return false;
    }); 
JS;

    $this->registerJs($js);
    ?>
