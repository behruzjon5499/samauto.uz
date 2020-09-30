<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$this->title = LangHelper::t($main->title_ru, $main->title_uz, $main->title_en );

$title = 'title_'.$lang;
$noImage = 'no-image.png';

?>
<div class="kareer-form site_modal askQuest ask_a_question" >
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen kareer">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span></div>

            <?php $form = \yii\widgets\ActiveForm::begin([]); ?>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'fullname')->textInput() ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'message')->textarea()->label('Что Вы Хотите Узнать?') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'phone')->textInput(['type' => 'tel'])->label('Контактный номер телефона') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email'])->label('E-mail') ?>
                </div>
            </div>

            <div class="graduate-form-btn">
                <button type="submit" class="ButtonBox js_internal-link">
                    <span class="ButtonBox-text">ОТПРАВИТЬ</span>
                    <span class="ButtonBox-icon">
                            <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
                        </span>
                </button>
            </div>

            <?php \yii\widgets\ActiveForm::end();?>
        </div>
    </div>
</div>
﻿    <div class="mission about_page section-gap">
    <div class="small_container">
        <div class="mTitle" data-aos="fade-right"><?= $this->title?></div>
        <div class="boxes" style="flex-wrap: wrap" data-aos="fade-up" data-aos-delay="200">
            <!-- ОБЩАЯ ИНФОРМАЦИЯ О ЗАВОДЕ -->
            <div class="col-12 full-karyera">
                <a href="https://samauto.uz/about/missions" class="item">
                    <div class="right">
                        <img src="/uploads/career/main/<?= $main->main_img?>" alt="">
                    </div>
                </a>
            </div>

            <?php /** @var \common\models\CareerMainList $list */
            $start = 0;
            $middle = 2;
            $left = false;
            $numItems = count($list);
            $i = 0;
            foreach ($list as $item):?>

            <?php if(++$i === $numItems): ?>
                    <div class="col-6">
                        <a href="" class="item _ask_btn">
                            <div class="<?php
                            if ($start < $middle) {
                                echo 'left';
                                $left = true;
                            } else {
                                echo 'right';
                                $left = false;
                            }
                            if ($start === $middle + 2) {
                                $middle += 4;
                            }
                            ?>">
                                <?php if ($left) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/main/'. $item->preview_img : '/uploads/career/main/'. $noImage);}?>

                            </div>
                            <div class="<?php
                            if ($left) {
                                echo 'right';
                                $left = true;
                            } else {
                                echo 'left';
                                $left = false;
                            }
                            ?>">
                                <?php if (!$left) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/main/'. $item->preview_img : '/uploads/career/main/'. $noImage);}?>
                            </div>
                        </a>
                    </div>
            <?php else:?>
                <div class="col-6">
                    <a href="<?= $item->url?>" class="item">
                        <div class="<?php
                        if ($start < $middle) {
                            echo 'left';
                            $left = true;
                        } else {
                            echo 'right';
                            $left = false;
                        }
                        if ($start === $middle + 2) {
                            $middle += 4;
                        }
                        ?>">
                            <?php if ($left) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/main/'. $item->preview_img : '/uploads/career/main/'. $noImage);}?>

                        </div>
                        <div class="<?php
                        if ($left) {
                            echo 'right';
                            $left = true;
                        } else {
                            echo 'left';
                            $left = false;
                        }
                        ?>">
                            <?php if (!$left) echo '<div class="num"></div><span>'. $item->$title .'</span>'; else {echo Html::img($item->preview_img ? '/uploads/career/main/'. $item->preview_img : '/uploads/career/main/'. $noImage);}?>
                        </div>
                    </a>
                </div>
                <?php endif;?>
            <?php $start++; endforeach;?>

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
