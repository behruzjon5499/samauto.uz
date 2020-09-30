<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$this->title = LangHelper::t('Вакансии', 'Vakansiyalar', 'Vacancies' );

$title = 'title_'.$lang;
$noImage = 'no-image.png';

?>

﻿    <div class="mission about_page section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $this->title?></div>
        <div class="boxes" style="flex-wrap: wrap" data-aos="fade-up" data-aos-delay="200">

            <?php /** @var \common\models\CareerMainList $list */
            $i = -1;
            $isLeft = true;
            foreach ($vacanciesCategory as $item):?>
                <div class="col-6">
                    <a href="vacancy-category?id=<?= $item->id?>" class="item">
                        <div class="<?php
                        if (++$i == 2) {
                            $isLeft = !$isLeft;
                            $i = 0;
                        }
                        if ($isLeft) {
                            echo 'left';
                        } else {
                            echo 'right';
                        }
                        ?>">
                            <?php if ($isLeft) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/vacancy/'. $item->preview_img : '/uploads/career/vacancy/'. $noImage);}?>

                        </div>
                        <div class="<?php
                        if ($isLeft) {
                            echo 'right';
                        } else {
                            echo 'left';
                        }
                        ?>">
                            <?php if (!$isLeft) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/vacancy/'. $item->preview_img : '/uploads/career/vacancy/'. $noImage);}?>
                        </div>
                    </a>
                </div>

            <?php endforeach;?>

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
