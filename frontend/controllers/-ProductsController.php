<?php
namespace frontend\controllers;

use Codeception\PHPUnit\Constraint\Page;
use common\helpers\ListHelper;
use common\models\Address;
use common\models\Brands;
use common\models\Categories;
use common\models\Colors;
use common\models\Comments;
use common\models\Favorites;
use common\models\Pages;
use common\models\Products;
use common\models\Styles;
use common\models\Videos;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\data\Pagination;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class ProductsController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

       $action = explode( '/',Yii::$app->request->url);
       $action = explode( '?',$action[1] );
       $action = $action[0];
       $breadcrumbs = '';

      // echo $action;

       if($action == 'mebel'){
           //$category_where = ['and',['!=','id','0'],['!=','id','38']];
           //$where['cat_id'] = 38;
           if($categories = Categories::find()->select('id,parent_id')->all()) {
               ListHelper::getSubCategoryIds($categories, 38);
               $where['cat_id'] = ListHelper::$sub_cat_ids;
           }
           $breadcrumbs = 'Мебель';

       }elseif($action == 'komnati'){
           //$category_where = ['and',['!=','id','0'],['parent_id'=>'38']];
           //$category_where = ['!=','id','0'];
           //$where['cat_id'] = 88;
           if($categories = Categories::find()->select('id,parent_id')->all()) {
               ListHelper::getSubCategoryIds($categories,88);
               $where['cat_id'] = ListHelper::$sub_cat_ids;
           }
           $breadcrumbs = 'Комнаты';

       }elseif($action == 'home-decor'){
           //$category_where = ['parent_id'=>'48'];
           //$where['cat_id'] = 48;
           if($categories = Categories::find()->select('id,parent_id')->all()) {
               ListHelper::getSubCategoryIds($categories,48);
               $where['cat_id'] = ListHelper::$sub_cat_ids;
           }
           $breadcrumbs = 'Домашний декор';

       }else{
           $breadcrumbs = '';
       }
       // print_r($_GET); exit;

        $category_where = ['!=','id','0'];


        // $params = Yii::$app->request->queryParams;

        // print_r($params);

        $ref_link = explode('?',Yii::$app->request->url);

        $filter = Yii::$app->request->get();
        // print_r($filter);

        $query = $filter;

        unset( $query['category']); // удалить категорию

        $query = '&'. http_build_query($query);

        if(isset($filter['page'])){
            $page = (int)$filter['page'];
        }else{
            $page = 1 ;
        }
        if(isset($filter['sort'])){
            $sort = (int)$filter['sort'];
        }else{
            $sort = 0;
        }

        if(isset($filter['show'])){
            $show = (int)$filter['show'];
        }else{
            $show = 12;
        }

        $products_count = 0;

        $queryProducts = Products::find();

       // $params['subcat'] = 'divany-krovati';

        /*if( isset( $params['subcat'] ) && $categories = Categories::find()
            ->where( ['link'=>$params['subcat'] ] )
            ->andWhere(['>','parent_id',0])
            ->with('parent')
            //->with('brands')
            ->all() ){ // если несколько с одинаковыми link в других категориях
        */
           // print_r($categories); exit;

           // $parent_id = 0;

            //$cat_id = 24; // для теста

            /*if( count($categories) ) { // если несколько категорий
                foreach ($categories as $cat) {
                    if (isset($cat->parent) && $cat->parent->id == $cat->parent_id) {
                        $cat_id = $cat->id;
                        $parent_id = $cat->parent_id;

                        echo ' cat ' . $cat->parent_id;

                        // $category = $cat;
                        break;
                    }
                }

                if( $cat_id==0 ) $cat_id = $categories->id;

            }else{ // найдена 1 категория
                $cat_id = $categories->id;
                $parent_id = $categories->parent_id;
               // $category = $categories[0];
            } */

            $where['status'] = 1;

            // фильтрация
            // если задан фильтр по стилю
            if(isset($filter['style']) && $filter['style']!=0) {
                $where['style_id'] = $filter['style'];
            }else{
                $filter['style'] = 0;
            }
            if(isset($filter['color']) && $filter['color']!='') {
                $filter_colors = trim($filter['color'],',');
                $filter_colors = explode(',',$filter_colors);
                $filter['color'] = $filter_colors; // переводим в массив
                $where['color_id'] = $filter_colors;
            }else{
                $filter['color'] = [];
            }
            if(isset($filter['collection']) && $filter['collection']!=0) {
                $where['collection_id'] = $filter['collection'];
            }else{
                $filter['collection'] = 0;
            }
            if(isset($filter['style']) && $filter['style']!=0) {
                $where['style_id'] = $filter['style'];
            }else{
                $filter['style'] = 0;
            }

            $filter['parent'] = 0; // родительская категория меню

            $category = false;

            // выбранная категория
            if(isset($filter['category']) && $filter['category']>0){
                $where['cat_id'] = $filter['category'];// текущая категория из которой товары

                if( $category = Categories::findOne($filter['category'])){
                    $filter['parent'] = $category->parent_id;
                }

            }else{
                $filter['category'] = 0;

            }

            // диапазон цен в бд
            if( $_products = Products::find()->select('MIN(price) as price_min, MAX(price) as price_max')->where(['status'=>1])->one() ) {
                $filter['price_min'] = (int)$_products->price_min;
                $filter['price_max'] = (int)$_products->price_max + 10000;
            }else{
                $filter['price_min'] = 10000;
                $filter['price_max'] = 1000000;
            }

            //print_r($filter);

            // выбранный диапазон цен в фильтре
            if( isset($filter['price']) ) {
                $price = explode(',',$filter['price']);
                $price_min = $price[0];
                $price_max = $price[1];
                $filter['price_cur_min'] = (int)$price[0];
                $filter['price_cur_max'] = (int)$price[1];
                $queryProducts = $queryProducts->andWhere(['and','price>='. $price_min , 'price<='.$price_max ]);

            }else{
                $filter['price_cur_min'] = $filter['price_min'];
                $filter['price_cur_max'] = $filter['price_max'];
            }

            //echo $queryProducts->createCommand()->getRawSql(); exit;

            // пагинация
            $pagination = new Pagination([
                'defaultPageSize' => $show,
                'totalCount' => $queryProducts->count(),
            ]);

            if($sort==0){ // цена убывание
                $sorting = ['price'=>SORT_DESC];
            }elseif($sort==1) { // цена возрастание
                $sorting = ['price' => SORT_ASC];
            }elseif($sort==2){ // дата убывание
                $sorting = ['added_date'=>SORT_DESC];
            }elseif($sort==3){ // дата возрастание
                $sorting = ['added_date'=>SORT_ASC];
            }

            // print_r($where);

            // print_r(ListHelper::$sub_cat_ids);

            if( ! $products = $queryProducts
                ->andWhere($where)
                ->orderBy($sorting)
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all() ){
                $products = false;
            }

            /*
            if( $sub_categories = Categories::find()
                ->where( ['parent_id'=>$parent_id] )
                //->with('brands')
                ->all() ){
                // здесь подсчет всех товаров

                $bids = [];
                $sc = [];
                $_productQuery = Products::find()->where(['status'=>1]);
                $or_query = ['or'];

                // подсчет кол-ва товаров во вложенных категориях

                foreach($sub_categories as $subcat) {
                     $sc[] = $subcat->id;

                }

                if (count($sc)) {
                    //$products_count = $_productQuery->andWhere($or_query)->count();
                    $products_count = $_productQuery->andWhere(['cat_id'=>$sc])->count();
                }

            }else{
                $sub_categories = false;
            }
            if( ! $category = Categories::find()
                ->where(['id'=>$parent_id])
                //->with('brands')
                ->one() ){
                $category = new Categories();

            } */
            // текущая выбранная подкатегрия
           /* if( ! $cur_category = Categories::find()
                ->where(['id'=>$cat_id])
                ->with('parent')
                //->with('brands')
                ->one() ){

                $category = new Categories();
            } */

        //}else{
        /*    $products = false;
            $pagination = false;
            $sub_categories = false;
            $category = new Categories();
            $products_count = 0;
        }*/

        //print_r($params);

        if( ! $products_new=Products::find()->where(['sale' => 1, 'status'=>1])->orderBy('added_date DESC')->limit(10)->all()){
            $products_new = false;
        }

        if( ! $products_sale=Products::find()->where(['sale' => 0, 'status'=>1])->orderBy('added_date DESC')->limit(10)->all()){
            $products_sale = false;
        }

        if(!$styles = Styles::find()->all()){
            $styles = false;
        };
        if(!$collections = Styles::find()->all()){
            $collections = false;
        }

        if(!$colors = Colors::find()->all()){
            $colors = false;
        }

        /*if(!$news=News::find()->where(['status' => 0])->limit(10)->all()){
            $news = false;
        }*/

        //$params['active_category_title'] = '';
        //if($sub_cat->link == $params['sub_link']) $active_cat = $sub_cat->title ;

         // echo '<pre>'; print_r($pagination); //exit;

        return $this->render('index',[
            'products_new'=> $products_new,
            'products_sale'=> $products_sale,
            'products'=> $products,
            'category'=> $category,
            'breadcrumbs' => $breadcrumbs,
            //'sub_categories'=> $sub_categories,
            //'params' => $params,
            'pagination' => $pagination,
            'ref_link' => $ref_link,
            'sort' => $sort,
            'page' => $page,
            'filter' => $filter,
           // 'categories' => $categories,
            //'cur_category' => $cur_category,
            'products_count' => $products_count,
            'styles' => $styles,
            'collections' => $collections,
            'colors' => $colors,
            'category_where' => $category_where,
            'query' => $query,
            //'category_link' => $action,

        ]);
    }


    public function actionBasket(){

        $cart = json_decode( Yii::$app->session->get('cart') , true) ;
        $products = [];

        if(!$products_new=Products::find()->where(['sale' => 1, 'status'=>1])->orderBy('added_date DESC')->limit(2)->all()){
            $products_new = false;
        }

        $products_similar = false; // нет похожих, если корзина пуста

        $cat_ids = [];
        if(count($cart)) {

            foreach ($cart as $item) {
                if (in_array($item['id'], $cart)) continue; // пропустить, уже есть в массиве
                $cat_ids[] = $item['id']; // добавить id категории
            }

            //print_r($cat_ids); exit;


            if (!$products_similar = Products::find()->where(['cat_id' => $cat_ids, 'status' => 1])->orderBy('added_date DESC')->limit(4)->all()) {
                $products_similar = false;
            }

        }

        if($pages = Pages::find()->where(['page'=>'delivery'])->one()) {
            $data = json_decode($pages->data, true);
        }else{
            $pages = new Pages();
            $pages->page = 'delivery';
            $data=[];
        }


        // $videos_card = Videos::find()->where(['type'=>6, 'status'=>0])->all();

        return $this->render('cart',[
            'cart'=>$cart,
            'products' => $products,
            'products_new'=> $products_new,
            'products_similar'=> $products_similar,
            'data'=>$data,
           // 'videos_card'=>$videos_card,
        ]);

    }


    // добавить в корзину несколько
    public function actionCartAdd()
    {

        //return json_encode(['status' => 0, 'info' => 'ddd']);

        $this->layout = false;
        //$title = 'title_' . $this->lang;

        $product_id =  Yii::$app->request->post('id'); // id товара
        $count = Yii::$app->request->post('count'); // кол-во
        if($count<0) $count=1;
        //$from_product = Yii::$app->request->post('from_product'); // из детализации продукта или нет ?

        // получаем товар
        if(!$product = Products::find()->with(['color'])->where(['id'=>$product_id,'status'=>1])->one()){
            return json_encode(['status' => 0, 'info' => json_encode($product_id) .  ' ' . Yii::t('app','Товар не найден!'), 'summ' => 0, 'count' => 0]);
        }

        // кол-во товаров на складе
        $quantity = $product->quantity;

        //$count++;

        // если куплено больше чем на складе - установить максимальное значение
        if ($quantity < $count) $count = $quantity; // нельзя купить больше чем есть на складе - в наличии

        $in_cart = false;
        if($cart = Yii::$app->session->get('cart')) { // получаем корзину
            $cart = json_decode($cart,true);
            foreach ( $cart as $n=>$item ) { //  по всей корзине
                if($product->id == $item['id']) { // товар найден в корзине

                    // перезапись товара - кол-ва

                    /* $cart[$n] = [
                        'count' => $count, // кол-во выбранное пользователем
                        'id' => $product->id,
                        'cat_id' => $product->cat_id,
                        'price' => $product->price,
                        'title' => $product->title,
                        'brend' => $product->brend,
                        'quantity' => $quantity,
                        'image' =>'/uploads/products/'.$product->id .'/thumb/'.$product->image,
                    ]; */

                    //$count++;

                    $cart[$n]['count'] = $count; // только кол-во
                    $in_cart = true;
                    break;
                }
            }
        }

        if( ! $in_cart ){ // если нет в корзине
            $lang = Yii::$app->session->get('lang');
            $title = 'title_' . $lang;
            $material = 'material_' . $lang;
            // добавляем новый товар в корзину
            $cart[] = [
                'id' => $product->id,
                'cat_id' => $product->cat_id,
                'price' => $product->price,
                'title' => $product->$title,
                //'brend' =>0,// $product->brand_id,
                'color-code' => $product->color->code,
                'color-title' => $product->color->$title,
                'material' => $product->$material,
                'size' => $product->size,
                'count' => $count, // кол-во выбранное пользователем
                'quantity' => $quantity,
                'image' =>'/uploads/products/'.$product->id .'/thumb/'.$product->image,
            ];
        }

        $cart_stat = $this->cartStat($cart);

        // обновить корзину
        Yii::$app->session->set('cart', json_encode($cart,JSON_UNESCAPED_UNICODE));

        if( $cart_stat['count'] ){
            return json_encode(['status' => 1, 'summ' => number_format($cart_stat['summ'],0,'.',' '), 'count' => $cart_stat['count']]);
        }else{
            return json_encode(['status' => 0, 'summ' => 0, 'count' => 0]);
        }

    }

    // добавить в избранное
    public function actionFavoritesAdd()
    {
        $this->layout = false;

        $product_id = (int)Yii::$app->request->post('id'); // id товара

        $user_id = Yii::$app->user->isGuest ? 0 : Yii::$app->user->id; // user

        if( $user_id == 0 && $product_id >0 ){  // аноним - избранное храним в сессии

            $has_favorite = false;

            // проверить есть ли запись в сессии
            if ( $favorites = Yii::$app->session->get('favorites') ) {

                $favorites = json_decode($favorites, true );

                $count = count($favorites);

                 if( count( $favorites ) ) {

                    foreach ( $favorites as $fav ) {
                        if ( $fav == $product_id ) {
                            $has_favorite = true;
                           // return json_encode( ['status' => 1111] );
                            break;
                        }
                    }

                }

                // если еще нет записи в сессии - добавить
                if( ! $has_favorite ){ // если нет в сесссии

                    $favorites[] = $product_id;

                    $count = count($favorites);

                    // обновить корзину
                    Yii::$app->session->set( 'favorites', json_encode( $favorites,JSON_UNESCAPED_UNICODE ) );

                    return json_encode( ['status' => 1, 'count' => $count, 'info' => Yii::t('app','Товар добавлен в избранное!')] );

                }

            }else{ // если ничего нет в сессии

                $favorites[] = $product_id;
                $count = count($favorites);
                // обновить корзину
                Yii::$app->session->set( 'favorites', json_encode( $favorites,JSON_UNESCAPED_UNICODE ) );

                return json_encode( ['status' => 1, 'count' => $count, 'info' => Yii::t('app','Товар добавлен в избранное!')] );

            }

        }else { // пользователь зареган и вошел в систему

            // ищем в избранном данный товар в БД
            if( ! $favorites = Favorites::find()->where(['user_id'=>$user_id,'product_id'=>$product_id])->one() ){

                // если в БД нет, добавляем новую запись

                $fav = new Favorites();
                $fav->user_id = $user_id;
                $fav->product_id = $product_id;
                $fav->save();

                $count = Favorites::find()->select('id')->where(['user_id'=>$user_id])->count();

                return json_encode(['status' => 1, 'count' => $count, 'info' => Yii::t('app','Товар добавлен в избранное!')]);
            }

        }

        return json_encode(['status' => 0, 'count'=> $count, 'info' =>   Yii::t('app','Товар уже имеется!')]);

    }

    // удалить из избранного
    public function actionFavoriteDelete()
    {
        $this->layout = false;

        $product_id = (int)Yii::$app->request->post('id'); // id товара

        $user_id = Yii::$app->user->isGuest ? 0 : Yii::$app->user->id; // user

        $count = 0;

        if( $user_id == 0 ){ // аноним - избранное храним в сессии

            $has_favorite = false;

            // проверить есть ли запись в сессии
            if ( $favorites = Yii::$app->session->get('favorites') ) {

                 $favorites = json_decode( $favorites, true );
                 $count = count( $favorites );

                if( $count >0 ) {
                    foreach ( $favorites as $id => $fav ) {
                        if ( $fav == $product_id ) {
                            $has_favorite = true;
                            $count--;
                            unset($favorites[$id]); // удалить из списка
                            break;
                        }
                    }
                }

                if( $has_favorite ){ // если найден в сессии

                    // обновить
                    Yii::$app->session->set( 'favorites', json_encode( $favorites,JSON_UNESCAPED_UNICODE ) );

                    return json_encode( ['status' => 1, 'count' => $count] );

                }

            }

        }else { // пользователь зареган и вошел в систему

            // ищем в избранном данный товар в БД для удаления
            if( $favorites = Favorites::find()->where(['user_id'=>$user_id,'product_id'=>$product_id])->one() ){

                $favorites->delete(); // удаляем из списка в БД

                $count = Favorites::find()->select('id')->where(['user_id'=>$user_id])->count();

                return json_encode(['status' => 1, 'count' => $count]);
            }

        }

        return json_encode(['status' => 0, 'count'=> $count]);

    }

    // показать избранное
    public function actionFavorites($user_id = 0){

        // $this->layout = false;

        if($user_id == 0 && Yii::$app->user->isGuest) { // если гость

            if ($favorites = Yii::$app->session->get('favorites')) {

                $favorites = json_decode($favorites, true);
                //print_r($favorites);

                // получить все продукты по id из избранного
                if( !$favorites = Products::find()->where(['id'=>$favorites])->all() ){

                    // нужно очитить список если кол-во в избранном больше 0, но товаров нет
                   // echo 'no data';
                    // Yii::$app->session->set( 'favorites', json_encode( $favorites,JSON_UNESCAPED_UNICODE ) );
                    $favorites = false;
                }

                //print_r($favorites);

            } else {
                //echo 'no data';
            }
        }else{

            if($user_id==0){
                $user_id = Yii::$app->user->id; // текущий пользователь
            }

            // из бд
            if( $favorites = Favorites::find()->where(['user_id'=>$user_id])->all() ){
                $_ids = [];
                foreach( $favorites as $favorite){
                    $_ids[] = $favorite->id;
                }
                if( ! $favorites = Products::find()->with('color')->where(['id'=>$_ids])->all() ){
                    $favorites = false;
                }

            }else{
                $favorites = false;
            }

        }

        if( $favorites ){
            $_cat_ids = [];
            foreach( $favorites as $favorite ){
                $_cat_ids[] = $favorite->cat_id;
            }
            if( ! $products_similar = Products::find()->where(['cat_id' => $_cat_ids, 'status' => 1])->orderBy('added_date DESC')->limit(2)->all() ) {
                $products_similar = false;
            }


        }else{
            // $products_similar = false;
            if( ! $products_similar = Products::find()->select('*,RAND(id)')->where(['status' => 1])->orderBy('added_date DESC')->limit(1)->all() ) {
                $products_similar = false;
            }
        }

        return $this->render('wishlist',[
            'favorites' => $favorites,
            'products_similar' => $products_similar,

        ]);

    }

    public function actionFavoritesShow(){

        $this->layout = false;

        if ( $favorites = Yii::$app->session->get('favorites') ) {
            $favorites = json_decode($favorites,true);
            print_r($favorites);

        }else{
            echo 'no data';
        }
        exit;
    }

    public function actionFavoritesClear(){

        $this->layout = false;

        Yii::$app->session->remove('favorites');

        exit;
    }

    public function actionItem($link){

        $lang = Yii::$app->session->get('lang');
        if($lang=='')$lang='ru';

        if( is_numeric( $link ) ){
            $where = ['id'=>$link];
        }else{
            $where = [ 'link_' . $lang => $link ];
        }

        if( $product = Products::find()->with(['category','gallery','color','comments'])->where($where)->one()){
            if( ! $sim_products = Products::find()->where(['cat_id'=>$product->cat_id])->andWhere(['!=','id',$product->id])->limit(4)->all() ){
                $sim_products = false;
            }
            if( ! $products = Products::find()->select('RAND(id)')->andWhere(['!=','id',$product->id])->orderBy('date DESC')->limit(6)->all() ){
                $products = false;
            }
        }else{
            $product = false;
            $products = false;
            $sim_products = false;
        }

         //echo '<pre>';         print_r($product);exit;

        return $this->render('item', [
            'product'=>$product,
            'sim_products'=>$sim_products,
            'products'=>$products,
        ]);

    }

    private function cartStat(&$cart){

        // прибавить доставку
        if($page = Pages::find()->where(['page'=>'delivery'])->one()){
            $data = json_decode( $page->data,true);
        }else{
            $data['price'] = 0;
        }

        // пересчет стат в корзине
        $summ = 0;
        $count = 0;
        foreach ($cart as $id => $_p) {
            $summ  += $_p['price'] * $_p['count'];
            $count += $_p['count'];
        }

        if($summ>0) {
            $summ += $data['price'];
        }else{
            $summ = 0;
        }

        $cart_stat = ['summ'=>$summ,'count'=>$count];
        Yii::$app->session->set('cart-stat',$cart_stat);

        return $cart_stat ;

    }


    // изменить корзину
    public function actionCartChange()
    {

        $id = (int) Yii::$app->request->post('id'); // id переданного индекса в корзине для упрощения
        $cnt =(int) Yii::$app->request->post('cnt'); // кол-во


        //$from_cart =(int) Yii::$app->request->post('from_cart'); // если из корзины, то прибавлять к текущему

        //return json_encode(['status' => 0,'info'=>$id . ' ' . $cnt  ] );

        if ($cart = Yii::$app->session->get('cart')) {

            if( $cart = json_decode($cart,true) ) {

                foreach ($cart as $n=>$item) {

                    if ($item['id']==$id) { // поиск товара в корзине

                        //if($from_cart) {
                        //    $cart[$n]['count'] += 1; // новое кол-во
                        //}else{
                            $cart[$n]['count'] = $cnt; // новое кол-во
                        //}

                        // обновить корзину
                        Yii::$app->session->set('cart', json_encode($cart, JSON_UNESCAPED_UNICODE));

                        $cart_stat = $this->cartStat($cart);

                        return json_encode(['status' => 1, 'info' => json_encode($cart), 'summ' => number_format($cart_stat['summ'], 0, '.', ' '), 'count' => $cart_stat['count']]);

                    }

                }
                $cart_stat = $this->cartStat($cart);
                return json_encode(['status' => 0,'info'=>$cnt, 'summ' => number_format($cart_stat['summ'], 0, '.', ' '), 'count' => $cart_stat['count']]);
            }
        }

        return json_encode(['status' => 0,'info'=>$cnt, 'summ'=>0, 'count'=>0 ]);

    }

    // удалить из корзины
    public function actionCartDelete()
    {

        $id = (int) Yii::$app->request->post('id'); // id переданного индекса в корзине для упрощения

        if ($cart = Yii::$app->session->get('cart')) {
            $cart = json_decode($cart,true);

            foreach ($cart as $n=>$item) {

                if ($item['id']==$id) { // поиск товара в корзине

                    unset($cart[$n]); // удаление переданного id в корзине

                    // обновить корзину
                    Yii::$app->session->set('cart', json_encode($cart, JSON_UNESCAPED_UNICODE));

                    $cart_stat = $this->cartStat($cart);

                    return json_encode(['status' => 1, 'info' => json_encode($cart), 'summ' => number_format($cart_stat['summ'], 0, '.', ' '), 'count' => $cart_stat['count']]);

                }

            }

        }

        return json_encode(['status' => 0,'info'=>$id, 'summ'=>0, 'count'=>0] );

    }

    public function actionCheckout(){

        if( Yii::$app->user->isGuest ) return $this->redirect('/'); // на главную, если не авторизовался

        $user_id = Yii::$app->user->id;

        $cart = json_decode( Yii::$app->session->get('cart') , true) ;
        $products = [];

        if(!$products_new=Products::find()->where(['sale' => 1, 'status'=>1])->orderBy('added_date DESC')->limit(2)->all()){
            $products_new = false;
        }

        $products_similar = false; // нет похожих, если корзина пуста

        $summ = 0;
        if(count($cart)) {
            $cat_ids = [];
            foreach ($cart as $item) {
                $summ += $item['count'] * $item['price'];
                if (in_array($item['id'], $cart)) continue; // пропустить, уже есть в массиве
                $cat_ids[] = $item['id']; // добавить id категории
            }

            if (!$products_similar = Products::find()->where(['cat_id' => $cat_ids, 'status' => 1])->orderBy('added_date DESC')->limit(4)->all()) {
                $products_similar = false;
            }

        }

        if( ! $address = Address::find()->where(['user_id'=>$user_id])->all() ){
            $address = false;
        }

        if( ! $videos_checkout = Videos::find()->where(['type'=>6, 'status'=>0])->all()){
            $videos_checkout = false;
        }

        return $this->render('checkout',[
            'cart'=>$cart,
            'summ' => $summ,
            'products' => $products,
            'products_new'=> $products_new,
            'products_similar'=> $products_similar,
            'videos_checkout'=>$videos_checkout,
            'address'=>$address,
         ]);

    }

    public function actionShowCart(){

        if ($cart = Yii::$app->session->get('cart')) {
            echo '<pre>';
            print_r(json_decode($cart,true));
            echo '</pre>';
        }else{
            echo  $cart;
        }

        if( $cart_stat = Yii::$app->session->get('cart-stat') ){
            echo '<pre>';
            print_r($cart_stat);
            echo '</pre>';

        }else{
            echo  $cart_stat;
        }

        exit;


    }

    // очистка всей корзины
    public function actionCartClear(){

        Yii::$app->session->remove('cart');

        Yii::$app->session->remove('cart-stat');

        return $this->redirect('/');

    }

    // отправка коммента пользователем
    public function actionSendComment(){

        $post = Yii::$app->request->post();
        $ref = Yii::$app->request->referrer;

        $comments = new Comments();

        $comments->date = time();
        $comments->user_id = Yii::$app->user->id;
        $comments->product_id = (int)$post['product_id'];
        $comments->text = htmlspecialchars($post['msg']);
        $comments->type = 0; // из товаров
        $comments->status = 0; // не прочитано админом
        if(!$comments->save()){
            print_r($comments->getErrors());
            exit;
        };

        return $this->redirect($ref);
    }


    // оплата
    public function actionPayment(){

        //$post = Yii::$app->request->post();
        //$ref = Yii::$app->request->referrer;

        // сначала формируем заказ, затем


        return json_encode(['status'=>1,'info'=>'ok','id'=>9]);

        //print_r($post); exit;

        // $payment = new Pay();

        $comments->date = time();
        $comments->user_id = Yii::$app->user->id;
        $comments->product_id = (int)$post['product_id'];
        $comments->text = htmlspecialchars($post['msg']);
        $comments->type = 0; // из товаров
        $comments->status = 0; // не прочитано админом
        if(!$comments->save()){
            print_r($comments->getErrors());
            exit;
        };

        return $this->redirect($ref);
    }



}