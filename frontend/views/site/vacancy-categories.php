<?php
/** категории вакансий
 * Created by PhpStorm.
 * User: USER
 * Date: 30.11.2018
 * Time: 13:41
 */

use common\helpers\LangHelper;

$title = 'title_' .$lang;
$_title =LangHelper::t("КАРЬЕРА", "KARYERA", "CAREER");
$this->title = $_title;
?>

<div class="localization _category section-gap">
    <div class="small_container">
        <div class="mTitle" yii-t="1" data-aos="fade-right"><?=$_title ?></div>
        <?php if($categories){ ?>

        <div class="slider_parts" data-aos="fade-up" data-aos-delay="200">
            <div class="wrapper">
                <?php foreach ($categories as $category){ ?>

                <div class="item">
                    <a href="/about/vacancy/<?=$category->id ?>" class="caption --get-vacancy-- preload" data-id="<?php //$category->id ?>">
                        <img src="/images/svg/employee.svg" style="max-width:200px"> <span><?=$category->$title ?></span>
                    </a>
                </div>

                <?php } ?>

            </div>
        </div>

        <?php } ?>

    </div>
</div>

<div data-aos="fade-up" data-aos-delay="300">

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/about" class="preload"><?=LangHelper::t("О КОМПАНИИ", "KOMPANIYA HAQIDA", "ABOUT COMPANY"); ?></a>
        <span><?=LangHelper::t("КАРЬЕРА", "KARYERA", "CAREER"); ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php /*
$script = " 
$('document').ready(function(){

     $('.get-vacancy').click(function(){
		var id = $(this).data('id');
		$(this).parent().remove();
		$.ajax({
			type: 'post',
            url: '/admin/companies/delete-gallery-item',            
            dataType: 'json',
            data: 'id='+id +'&_csrf='+yii.getCsrfToken(),
            success: function(data){
			},
            error: function(jqxhr, status, errorMsg) {
				alert('Статус: ' + status + ' Ошибка: ' + errorMsg );				
			}
        });		
	});	
});";
$this->registerJs($script, yii\web\View::POS_END); */