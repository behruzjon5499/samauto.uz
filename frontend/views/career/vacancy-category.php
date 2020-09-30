<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$this->title = $title;

$title = 'title_'.$lang;
$noImage = 'employee.jpg';

?>

﻿    <div class="localization _category section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $this->title?></div>
        <div class="slider_parts" data-aos="fade-up" data-aos-delay="200">
            <div class="wrapper" style="align-items: baseline;">

                <?php foreach ($vacancies as $vacancy):?>

                <div class="item">
                    <a href="vacancy?id=<?= $vacancy->id?>" class="caption --get-vacancy-- preload" data-id="">
                        <img src="/uploads/career/vacancy/<?= $vacancy->preview_img !== null || $vacancy->preview_img != 0 ? $vacancy->preview_img : $noImage; ?>" style="max-width:200px"> <span><?= $vacancy->$title?>  </span>
                    </a>
                </div>

                <?php endforeach; ?>
            </div>

            </div>
        </div>
</div>

<div>

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
