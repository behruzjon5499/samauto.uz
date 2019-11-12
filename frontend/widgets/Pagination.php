<?php
namespace frontend\widgets;

use Yii;

class Pagination extends \yii\bootstrap\Widget
{
    public $pagination;
    public $options;
    public $show_pages = 4;

    public function init(){}

    public function run() {

        if( ! is_object( $this->pagination ) ) return false;

        if( ! isset($this->options) ){ // если опции не заданы

            $this->options = [
                'class' =>'catalog__pagination',
                'link_class' => 'pagination__link',
                'link_active' => 'pagination__link--active',
                'link_prev_class' => 'pagination__nav pagination__nav--left',
                'link_prev_icon_class' => 'fas fa-chevron-left',
                'link_next_class' => 'pagination__nav pagination__nav--right',
                'link_next_icon_class' => 'fas fa-chevron-right',
            ];

        }

        $params = Yii::$app->request->queryParams;



        // $url = explode('?', Yii::$app->request->url )[0];

        //echo Yii::$app->request->url;

        // print_r( $params );

        if( isset( $params['page'] ) ){
            $page = (int)$params['page'];
        }else{
            $page = 1;
        }

        /*$url = '';
        foreach ($params as $param => $val ){
            $url .= $param .''
        } */

        unset($params['page']);
        if(count($params)>0) {
            $url =  '&' . http_build_query($params);
        }else{
            $url = '' ;
        }



        /*if(isset($params['sort'])){
            $sort = '&sort=' . (int)$params['sort'];
        }else{
            $sort = '' ;
        }

        if(isset($params['style'])){
            $style = '&style=' . (int)$params['style'];
        }else{
            $style = '' ;
        }
        if(isset($params['collection'])){
            $collection = '&collection=' . (int)$params['collection'];
        }else{
            $collection = '' ;
        }
        if(isset($params['show'])){
            $show = '&show=' . (int)$params['show'];
        }else{
            $show = '' ;
        }
        if(isset($params['category'])){
            $category = '&category=' . (int)$params['category'];
        }else{
            $category = '' ;
        }
        if(isset($params['color'])){
            $color = '&color=' . (int)$params['color'];
        }else{
            $color = '' ;
        }
        if(isset($params['price'])){
            $price = '&price=' . (int)$params['price'];
        }else{
            $price = '' ;
        }

        if(isset($params['q'])){
            $search = '&q=' . $params['q'];
        }else{
            $search = '' ;
        }*/

        $page_prev = $page - 1;

        $page_next = $page + 1;

        if( $page_prev < 1 ) $page_prev = 1;

        //echo $this->pagination->defaultPageSize; exit;


        $count_pages = ceil($this->pagination->totalCount / $this->pagination->defaultPageSize );
        if( $page_next > $count_pages ) $page_next = $count_pages;// $this->pagination->totalCount;

        $url_prev = '?page=' . $page_prev . $url; // . $sort . $brand . $search;
        $url_next = '?page=' . $page_next . $url; // . $sort . $brand . $search;

        //echo $this->pagination->totalCount . ' ' . $this->pagination->defaultPageSize;

        return $this->render('pagination', [
            'page' => $page,
            //'sort' => $sort,
            //'brand' => $brand,
            //'search' => $search,
            'url' => $url,
            'totalCount' => $this->pagination->totalCount,
            'defaultPageSize' => $this->pagination->defaultPageSize,
            'url_prev'=> $url_prev,
            'url_next'=> $url_next,
            'options' => $this->options,
        ]);



    }
}