<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 09.10.2018
 * Time: 16:45
 */

use common\helpers\LangHelper; 

$this->title =LangHelper::t("ПОИСК", "QIDIRUV", "SEARCH");
?>

<div class="_searchBox">
    <label for=""><?=LangHelper::t("ПОИСК ДЕТАЛЕЙ ПО", "QIDIRUV", "SEARCH FOR ITEMS BY"); ?>:</label>
    <div class="flex_row">
        <div class="inp"><input class="loc-filter" id="loc_num" value="<?=@$_num ?>" type="text" placeholder="<?=LangHelper::t("НОМЕР ДЕТАЛИ", "DETAL RAQAMI", "DETAIL NUMBER"); ?>"></div>
        <div class="inp"><input class="loc-filter" id="loc_model" value="<?=@$_model ?>" type="text" placeholder="<?=LangHelper::t("МОДЕЛЬ", "MODEL", "MODEL"); ?>"></div>
        <div class="inp"><input class="loc-filter" id="loc_title" value="<?=@$_title ?>" type="text" placeholder="<?=LangHelper::t("НАИМЕНОВАНИЕ", "DETAL NOMI", "NAME"); ?> "></div>
    </div>
</div>

<?php
$script = "
$(document).ready(function () {
       
    $(document).on('change input keydown', '.loc-filter', function(key){
        if( key.keyCode == 13 ) {
            num = $('#loc_num').val();
            model = $('#loc_model').val(); 
            title = $('#loc_title').val();
            link = '';
            if(num.length>0) link ='num='+num;
            if(model.length>0) {
                if(link.length>0){
                    link +='&model='+model;
                }else{
                    link +='model='+model;
                }
            }    
            if(title.length>0) {
                if(link.length>0){
                    link +='&title='+title;
                }else{
                    link +='title='+title;
                }
            }
            if(link.length>0) location.href = '/search-localization?' + link 
        }
    });
    
});";
$this->registerJs($script, yii\web\View::POS_END);
