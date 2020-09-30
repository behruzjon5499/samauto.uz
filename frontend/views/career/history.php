<?php

use common\helpers\LangHelper;
use yii\helpers\Html;

/** @var \common\models\CareerMain $main */
$title = 'title_'.$lang;
$this->title = $history->$title;

$text = 'text_'.$lang;
$noImage = 'employee.jpg';

?>
<div class="section-gap ">
    <div class="small_container vacancy-info">
        <div class="mTitle" data-aos="fade-right"><?= $history->$title?></div>
        <div class="vacancy-details" data-aos="fade-up" data-aos-delay="300"><?= $history->$text?></div>

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
