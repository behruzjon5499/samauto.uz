<?php
use common\helpers\LangHelper;

$title = 'title_' . $lang;
$link = 'link_' . $lang;

$_title =LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION");
$this->title = $_title;
/* echo '<pre>';
print_r($products);
echo '</pre>'; */
?>

<div class="site_modal partModal shoow" style="display: none;">
    <div class="overlayClose"></div>
    <div class="flex_row_cen_cen ajax_localization">

    </div>
</div>

<div class="localization section-gap">
    <div class="small_container">
        <div class="mTitle"><?=$_title ?></div>

        <?= $this->render('search-form',[
            /*'_num'   => @$num,
            '_model' => @$model,
            '_title' => @$_title,*/
        ]);

        ?>

        <div class="slider_parts">
            <div class="mTitle3"><span><?=$category->$title ?></span></div>
            <div class="wrapper">

                <?php if($products){
                foreach($products as $product){ ?>

                    <div class="item localization-item" data-id="<?=$product->id?>" >
                        <div class="caption">
                            <img src="/uploads/products/<?=$product->id . '/' . $product->image ?>" alt="">
                            <span><?=$product->$title ?></span>
                        </div>
                    </div>

                <?php }
                } ?>

            </div>
        </div>
    </div>
</div>

<div>

<div class="site_bread">
    <div class="centerBox">
        <a href="/" class="preload"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <a href="/localization" class="preload"><?=LangHelper::t("ЛОКАЛИЗАЦИЯ", "MAHALLIYLASHTIRISH", "LOCALIZATION"); ?></a>
        <a href="#" class="preload"><?=@$category->parent->$title ?></a>
        <span><?=$category->$title ?></span>
    </div>
</div>

<?= $this->render('../layouts/_footer') ?>

<?php
$server_error =LangHelper::t("Сервер недоступен! Повторите попытку позже.", "Server mavjud emas! Keyinroq qayta urinib ko‘ring.", "Server is not available! Please try again later.");

$script = "
$(document).ready(function () {
    $('.slider_parts .caption').on('click', function(){
        $('.partModal').fadeIn().addClass('shoow');
    });
    var title = 0;
    $(window).on('load resize', function(){
        $('.options .black').each(function () {
            var h_block = parseInt($(this).height());
            if(h_block > title) title = h_block;                
        });
    });
    $('.options .black').height(title);
    
    $('.localization-item').click(function(){
        id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '/get-localization',
            data: 'id='+id+'&_csrf=' + yii.getCsrfToken(),
            dataType: 'json',
            success: function(data){
                if(data.status==1) $('.ajax_localization').html(data.html);
            },
            error: function(data){
                alert( '{$server_error}'  ) ;
            }
         });  
    });
    
});";
$this->registerJs($script, yii\web\View::POS_END);