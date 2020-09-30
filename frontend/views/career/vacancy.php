<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$this->title = LangHelper::t($vacancy->category->descr_ru, $vacancy->category->descr_uz, $vacancy->category->descr_en );

$title = 'title_'.$lang;
$text = 'text_'.$lang;
$noImage = 'employee.jpg';

?>
<div class="kareer-form site_modal askQuest ask_a_question" >
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen vacancyinfo">
        <div class="wrap">
            <div class="closeBtn"><span></span><span></span></div>

            <?php $form = \yii\widgets\ActiveForm::begin([]); ?>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'secondname')->textInput()->label('Фамилия') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'firstname')->textInput()->label('Имя') ?>
                </div>
            </div>

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'thirdname')->textInput()->label('Отчество') ?>
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

            <div class="graduate-form">
                <div class="inf">
                    <?= $form->field($model, 'file')->fileInput(['class' => 'inputfile'])->label('Резюме (.DOC, .DOCX, .PDF, .XLS, .XLSX)') ?>
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
<div class="section-gap ">
    <div class="small_container vacancy-info">
        <div class="mTitle" data-aos="fade-right"><a href="/career/vacancy-category?id=<?= $vacancy->category->id?>"><?= $this->title?></a></div>
        <div class="vacancy-name" data-aos="fade-left" data-aos-delay="100">
            <p><?= $vacancy->$title?></p>
        </div>
        <div class="vacancy-details" data-aos="fade-up" data-aos-delay="300"><?= $vacancy->$text?></div>

        <div class="vacancy-button">
            <a href="#" class="ButtonBox js_internal-link _ask_btn"  data-id="3">
                <span class="ButtonBox-text"><?= LangHelper::t('Подать заявку', 'So\'rovnoma yuborish', 'Apply')?></span>
                <span class="ButtonBox-icon">
                <svg id="arrow-light-right" viewBox="0 0 16 14" width="100%" height="100%"><path d="M9.8.5H8.2l5.6 5.9H.1v1.2h13.7l-5.6 5.9h1.6L15.9 7z"></path></svg>
            </span>
            </a>
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
