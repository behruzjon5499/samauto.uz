<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12.07.2018
 * Time: 16:10
 */

use common\helpers\LangHelper;
 
$title = 'title_' . $lang;
$_title =LangHelper::t("ПОИСК", "QIDIRUV", "SEARCH");
$this->title = $_title;

?>
<div class="cars-grid search-results section-gap">
  <div class="small_container">
    <div class="mTitle"><?=$_title ?>: <span style="color: #868786;"><?=$query ?></span></div>
    <div class="slider_parts">
      <div class="wrapper">

          <?php foreach($results as $result) {

              if ( count($result['items']) == 0 ) continue;

              ?>

              <div><h2><?=Yii::t('app',$result['title']) ?></h2></div>

              <?php

              foreach ($result['items'] as $item) {
                  $data = \common\helpers\SearchHelper::getData( $item, $result['link_type'] );
                  //$result['field']

              ?>

                  <div class="item">
                      <a href="<?=$data['link'] ?>" class="caption">
                          <div class="img" style="background-image:url(<?=$data['image'] ?>)"></div>
                          <?php

                          //echo $result['field'] ;

                          /* if( is_array( $item->$result['field'] ) ) {

                              print_r( $item->$result['field'] );

                              echo 'dddd';

                          } */

                          // print_r($item);

                          ?>
                          <span><?= $item[$result['field']]; //. ' - ' . @$result['field'] ;// $item->$result['field'] ?></span>
                      </a>
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
        <a href="/"><?=LangHelper::t("ГЛАВНАЯ", "ASOSIY SAHIFA", "HOME"); ?></a>
        <span><?=LangHelper::t("ПОИСК", "QIDIRUV", "SEARCH"); ?></span>
    </div>
</div>
<script>
    /*$('.slider_parts .wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
        nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>'
    });*/
</script>

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

