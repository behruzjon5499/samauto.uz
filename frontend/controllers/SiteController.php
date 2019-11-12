<?php

namespace frontend\controllers;

use common\helpers\FileHelper;
use common\models\Actions;
use common\models\Brands;
use common\helpers\SearchHelper;
use common\models\Calls;
use common\models\CarsSlider;
use common\models\Categories;
use common\models\Companies;
use common\models\CompanyUsers;
use common\models\Dillers;
use common\models\DillersOffice;
use common\models\DillersServices;
use common\models\Documents;
use common\models\DownloadPrice;
use common\models\Faqs;
use common\models\Gallery;
use common\models\History;
use common\models\HistoryEvents;
use common\models\Messages;
use common\models\Missions;
use common\models\News;
use common\models\Pages;
use common\models\Partners;
use common\models\Products;
use common\models\Questions;
use common\models\Receptions;
use common\models\Regions;
use common\models\Transport;
use common\models\User;
use common\models\Vacancy;
use common\models\VacancyCategory;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;
use common\helpers\LangHelper;



/**
 * Site controller
 */
class SiteController extends Controller
{

    private $lang = 'ru';

    public function beforeAction($action)
   {
       $lang = Yii::$app->session->get('lang');
       if( $lang =='' ) $lang = 'ru';
       $this->lang = $lang;

       return parent::beforeAction($action); // TODO: Change the autogenerated stub
   }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], */
        ];
    }

    public function actionSitemap(){

        return $this->render('sitemap',[

            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],

        ];
    }

    // установка языка
    public function actionLang($lang = 'ru'){
        $ref = Yii::$app->request->referrer;
        $_lang = ['ru','uz','en']; // допустимые языки
        if( !in_array($lang,$_lang) ) $lang = 'ru';
        Yii::$app->session->set('lang',$lang);

        Yii::$app->language = $lang; // установка языка на сайте

        return $this->redirect($ref );
    }

    /**
     * главная страница
     *
     * @return mixed
     */
    public function actionIndex()
    {
        // показать несколько товаров в галереи, у которых указано hit
        if(!$products = Products::find()->where(['status'=>1,'hit'=>1])->limit(10)->all()){
            $products= false;
        }

        if(!$news = News::find()->where(['status' => 1])->limit(9)->all()){
            $news = false;
        }

        // слайдер разделов авто
        if(!$cars_slider = CarsSlider::find()->where(['status' => 1])->all()){
            $cars_slider = false;
        }

        if($_regions = Regions::find()->orderBy('name_ru ASC')->all()){
            $name = 'name_'.$this->lang;
            $regions = [];
            foreach ($_regions as $region){
                $regions[$region->id] = $region->$name;
            }
        }else{
            $regions = false;
        }

        return $this->render('index',[
            'products'=> $products,
            'news'=> $news,
            'lang' => $this->lang,
            'cars_slider' => $cars_slider,
            'regions' => $regions,
        ]);
    }



    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/profile');
        }

        $model = new LoginForm();
        if ( $model->load(Yii::$app->request->post()) && $model->login() ) {
            return $this->redirect('/profile' );
        } else {
            $model->password = '';
            return $this->redirect( Yii::$app->request->referrer );
        }

    }

    /**
     * Signs user up.
     *
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect('/profile');
                }
            }
        }
        return $this->redirect('/');

    }

    // проверка email на уникальность
    public function actionCheckEmail(){

        $email = Yii::$app->request->post('email');

        $email = htmlspecialchars( $email );

        if( $user = User::find()->select('id')->where(['email'=>$email])->one() ){

            return json_encode([ 'status' => 1 ]); // email есть

        }

        return json_encode([ 'status' => 0 ]);

    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/'); // goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();

        } else {

            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionFaq($id=0)
    {

        if($id==0) {

            return $this->render('faq', [
                'lang' => $this->lang,
            ]);
        }else{
            if(! $models = Faqs::find()->where(['status'=>1,'type'=>$id])->all() ){
                $models = false;
            }
            $_type[1] =LangHelper::t("ПРОЦЕСС ПОКУПКИ", "XARID QILISH JARAYONI", "PURCHASE PROCESS");
            $_type[2] =LangHelper::t("ЭКСПЛУАТАЦИЯ И ОБСЛУЖИВАНИЕ", "FOYDALANISH VA TEXNIK XIZMAT", "EXPLOITATION AND SERVICE");
            $_type[3] =LangHelper::t("ДОКУМЕНТАЦИЯ", "HUJJATLAR", "DOCUMENTATION");

            return $this->render('faq-items', [
                'models' => $models,
                'type' => $_type[$id],
                'lang' => $this->lang,
            ]);
        }

    }

    /*public function actionFaqItem($type)
    {
        echo 'dd'; exit;

        if(! $models = Faqs::find()->where(['status'=>1,'type'=>$type])->all() ){
            $models = false;
        }
        $_type[1] = Yii::t('app','Процесс покупки');
        $_type[2] = Yii::t('app','Эксплуатация и обслуживание');
        $_type[3] = Yii::t('app','Документация');

        return $this->render('faq-items', [
            'models' => $models,
            'type' => $_type[$type],
            'lang' => $this->lang,
        ]);

    }*/


    // отправка телефона - обратный звонок
    public function actionSendPhone(){

        $post = Yii::$app->request->post();
        $msg = new Calls();

        $msg->phone = htmlspecialchars(@$post['phone']);
        $msg->name = htmlspecialchars(@$post['name']);
        $msg->date = time();
        $msg->status = 0; // не прочитано


        if($msg->save()){
            //$this->sendEmail($msg);
            echo json_encode(['status'=>1]);
        }else{
            echo json_encode(['status'=>0,'info'=>json_encode($msg->getErrors(),JSON_UNESCAPED_UNICODE)]);
        }
        exit;

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionContacts()
    {

        $post = Yii::$app->request->post();

        if(isset($post['Messages']['msg'])){

            $model = new Messages();

            if( $model->load($post) ){

                $model->date = time();
                $model->save();

                Yii::$app->session->setFlash('info','Ваше сообщение успешно отправлено!');

                return $this->refresh();
            }

        }

        return $this->render('contacts', [

        ]);
    }

    public function actionAbout()
    {
        if($pages = Pages::find()->where(['page'=>'about'])->one()) {
            $data = json_decode($pages->data, true);
            if (!$gallery = Gallery::find()->where(['type' => 1])->all()) {
                $gallery = false;
            }

        }else{
            $pages = new Pages();
            $pages->page = 'about';
            $data=[];
            $gallery = false;

        }

        // print_r( $data );

        return $this->render('about', [
            'data' => $data,
            'gallery' => $gallery,
        ]);
    }

    // вакансии
    public function actionVacancy($id=0)
    {

        if($id==0) { // не задана категория - отобразить список категорий вакансий

            if (!$categories = VacancyCategory::find()->where(['status' => 1])->all()) {
                $categories = false;
            }

            return $this->render('vacancy-categories', [
                'categories' => $categories,
                'lang' => $this->lang,
            ]);

        }else{ // задана категрия вакансий - отобразить список вакансий в данной категории
            if ($vacancies = Vacancy::find()->with('category')->where(['status' => 1,'category_id'=>$id])->all()) {
                $title = 'title_' . $this->lang;
                $category = $vacancies[0]->category->$title;
            }else{
                $vacancies = false;
                $category = '';
            }

            return $this->render('vacancy', [
                'vacancies' => $vacancies,
                'category' => $category,
                'lang' => $this->lang,
            ]);
        }

    }

    // ajax - получение вакансии по id
    public function actionGetVacancy()
    {

        $this->layout = false;

        $id = (int)Yii::$app->request->post('id'); // id вакансии

        if( $vacancy = Vacancy::find()->with('category')->where(['status'=>1,'id'=>$id])->one() ){

            $html = $this->render('ajax-vacancy', [
                'vacancy' => $vacancy,
                'lang' => $this->lang,
            ]);

            return json_encode(['status'=>1,'html'=>$html],JSON_UNESCAPED_UNICODE);
        }

        return json_encode(['status'=>0]);

    }

    // руководители
    public function actionLeadership()
    {
        if( ! $leaderships = CompanyUsers::find()->with('workers')->where(['status'=>1,'type'=>1])->limit(1)->one() ) {
            $leaderships = false;
        }

        return $this->render('about-leadership', [
            'worker' => $leaderships,
            'model_question' => new Questions(),
            'model_reception' => new Receptions(),
            'lang' =>$this->lang,

        ]);
    }

    // ajax
    public function actionGetWorkers(){
        $this->layout=false;
        $id = (int)Yii::$app->request->post('id');
        
        if( !$worker = CompanyUsers::find()/*->with('workers')*/->where(['id'=>$id, 'status'=>1])->one() ){
            return json_encode(['status'=>0,'html'=>'Not found']);
        }

        $html = $this->render('ajax-about-leadership', [
            'worker' => $worker,
            'lang' => $this->lang,
        ]);

        return json_encode(['status'=>1,'html'=>$html],JSON_UNESCAPED_UNICODE);

    }

    /*public function actionGetWorkers(){
        $this->layout=false;
        $id = (int)Yii::$app->request->get('id');
        $child = (int)Yii::$app->request->get('child');
        if($child==0) {
            if( ! $leaderships = CompanyUsers::find()->with('workers')->where(['parent_id'=>$id, 'status'=>1])->all() ){
                $leaderships = false;
            }
            return $this->render('ajax-about-leadership', [
                'workers' => $leaderships,
                'lang' => $this->lang,
            ]);
        }else{
            //echo 'id ' . $id;      exit;
            if( ! $leaderships = CompanyUsers::find()->with('workers')->where(['id'=>$id, 'status'=>1])->one() ){
                $leaderships = false;
            }
            return $this->render('ajax-about-leadership-two', [
                'workers' => $leaderships,
                'lang' => $this->lang,
            ]);
        }
    } */

    public function actionMissions()
    {
        if(!$missions = Missions::find()->all()) {
            $missions = false;
        }
        return $this->render('about-missions', [
            'missions' => $missions,
            'lang' => $this->lang,
        ]);
    }
    public function actionMission($id)
    {
        $id = (int) $id;
        if( $mission = Missions::findOne($id) ) {
            $data = json_decode($mission->data, true);
        }else{
            return $this->redirect('/about/missions');
        }
       //print_r($data);
        return $this->render('about-mission', [
            'data' => $data,
            'mission' => $mission,
            'lang' => $this->lang,
        ]);
    }
    public function actionDocuments()
    {
        if( ! $documents = Documents::find()->where(['status'=>1])->all() ) {
            $documents = false;
        }
        return $this->render('about-documents', [
            'documents' => $documents,
            'lang' => $this->lang,
        ]);
    }
    // символика
    public function actionSymbols()
    {
        if( $symbols = Pages::find()->where(['page'=>'symbols'])->one() ) {
            $symbols = json_decode($symbols->data,true);
        }else{
            $symbols = false;
        }
        if($show_sym = Yii::$app->request->get('v')){
            switch($show_sym){
                case '1':
                    $show_sym = '.flagM';
                    break;
                case '2':
                    $show_sym = '.gerbM';
                    break;
                case '3':
                    $show_sym = '.gimnM';
                    break;
                default:
                    $show_sym = '';
            }
        }else{
            $show_sym = '';
        }
        return $this->render('symbols', [
            'symbols' => $symbols,
            'show_sym'=>$show_sym,
            'lang' => $this->lang,
        ]);
    }
    // история
    public function actionHistory()
    {
        // список всех годов событий
        if( ! $histories = History::find()->with('eventsgroup')->where([ 'status'=> 1 ])->orderBy('year ASC')->all() ) {
            $histories = false;
        }
        /* if( ! $history = HistoryEvents::find()->with(['gallery'])->where([ 'status'=> 1 ])->orderBy('history_id ASC, date ASC')->one() ) {
            $history = false;
        } */
        if( ! $history = HistoryEvents::find()->with(['gallery'])->where([ 'status'=> 1 ])->orderBy('title_ru DESC, date ASC')->one() ) {
            $history = false;
        }
        return $this->render('about-history', [
            'history' => $history,
            'histories' => $histories,
            'lang' => $this->lang,
        ]);
    }
    // ajax - событие из истории
    public function actionGetHistory()
    {
        $this->layout = false;
        $id = (int)Yii::$app->request->post('id');
        if( $history = HistoryEvents::find()->with(['gallery'])->where([ 'status'=> 1 ,'id'=>$id])->one() ) {
            $view = $this->render('ajax-about-history', [
                'history' => $history,
                'lang' => $this->lang,
            ]);
            return json_encode(['status'=>1,'html'=>$view]);
        }
        return json_encode(['status'=>0]);
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                return json_encode(['status'=>1,'info'=>'На ваш email отправлено письмо для восстановление пароля!' ]);
            }
        }
        return json_encode(['status'=>0,'info'=>'Ошибка при отправке письма!' ]);
    }

    public function actionCatalog(){
        if( ! $categories = Categories::find()->with('subCategories')->where(['parent_id' => 0])->asArray()->all()){
            $categories = null;
        }
        //echo "<pre>";        print_r ($categories);exit;
        $count = Categories::find()->count();
        $count = $count + 1;
        //$videos_catalog = Videos::find()->where(['type'=>1, 'status'=>0])->all();
        return $this->render('catalog',[
            'categories'=> $categories,
            'count' => $count,
            //'videos_catalog' => $videos_catalog,
        ]);
    }

    public function actionNews(){
        $query = News::find()->where(['status'=>0])->orderBy('date ASC');
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize'=>12]);
        $news = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('news', [
            'news' => $news,
            'pages' => $pages,
        ]);
    }

    // поиск товаров
    public function actionSearch()
    {
        // поисковый запрос
        $query = Yii::$app->request->get('q');
        // оставить только буквы и цифры
        $q = preg_replace('/[^-a-zA-ZА-Яа-я0-9\+\s]/ui', '', $query);
        // разбить запрос на слова
        $q = explode(' ', trim($q));
        // исключаем короткие слова - предлоги или слова длиной меньше 3 (6 байт) символов
        // $excludeWords = array('а', 'и', 'на', 'из', 'под', 'над', 'как', 'с', 'к', 'в', 'по', 'я', 'ты', 'он', 'она', 'оно', 'они', 'не', 'ни', 'нет', 'мы', 'вы', 'их', 'тех', 'у', 'от', 'при', 'про', 'это', 'то', 'тот', 'этот', 'та', 'то', 'ту', 'ее', 'ею', 'его');
        foreach ($q as $k => $v) {
            if ( /* in_array($v, $excludeWords) || */ strlen($v) < 2 ) unset($q[$k]); // = ''; // по 2 байта на символ.  in_array($v,$predlog)
        }

        $queryActions = Actions::find()->select("id,title_{$this->lang},link,image")->where(['status' => 1]);
        //$queryCompanies = Companies::find()->where(['status' => 1]);
        //$queryCompanyUsers = CompanyUsers::find()->where(['status' => 1]);
        //$queryDillers = Dillers::find()->where(['status' => 1]);
        $queryDillersOffics = DillersOffice::find()->select("id,diller_id,title_{$this->lang}")->with('diller')->where(['status' => 1]);
        $queryDillersServices = DillersServices::find()->select("id,diller_id,title_{$this->lang}")->with('diller')->where(['status' => 1]);
        $queryFaqs = Faqs::find()->where(['status' => 1]);
        $queryHistory = HistoryEvents::find()->where(['status' => 1]);
        $queryMissions = Missions::find();
        $queryNews = News::find()->where(['status' => 1]);
        $queryLocalization = Categories::find()->select("id,parent_id,title_{$this->lang},link_{$this->lang}")->with('parent');
        $queryTransport = Transport::find()->where(['status' => 1]);
        $queryVacancy = Vacancy::find()->where(['status' => 1]);

        $results = [];
        
        $find = 0;
        // нужно вытащить корни слова исп. стеммер
        if ( count($q) > 0) {
            $search = new SearchHelper();
            $title = 'title_' . $this->lang;
            $text = 'text_' . $this->lang;
            //$doljnost = 'doljnost_' . $this->lang;
            //$name = 'name_' . $this->lang;

            $or_query = ['or'];
            $or_query_text = ['or'];
           // $or_query_user = ['or'];

            foreach ($q as $item) {
                // по всем введенным поисковым словам
                $res = $search->stem_word($item); // получение коренного слова
                if ($res == '') $res = $item; // если корня нет взять то, что введено

                $or_query[] = ['like', $title, $res];
                $or_query_text[] = ['like', $text, $res];
               // $or_query_user[] = ['like', $doljnost, $res];
               // $or_query_user[] = ['like', $name, $res];

            }



            $results[] = [
                'title'=>'Транспорт',
                'items' => $queryTransport->andWhere($or_query)->all(),
                'link_type' => 'transport',
                'field' => 'title_' . $this->lang,
            ];

            $results[] = [
                'title'=>'Новости',
                'items' => $queryNews->andWhere($or_query)->all(),
                'link_type' => 'news',
                'field' => 'title_' . $this->lang,
            ];

            // $ql = $queryLocalization->andWhere($or_query)->all();

            $results[] = [
                'title'=>'Товары',
                'items' => $queryLocalization->andWhere($or_query)->all(),
                'link_type' => 'localization',
                'field' => 'title_' . $this->lang,
            ];


            //echo $ql->createCommand()->getRawSql();

            /* echo '<pre>';
             print_r($ql);
             exit;*/




            $results[] = [
                'title' => 'События',
                'items' => $queryActions->andWhere($or_query)->all(),
                'link_type' => 'actions',
                'field' => 'title_' . $this->lang,
            ];

            $results[] = [
                'title' => 'ОФис',
                'items' => $queryDillersOffics->andWhere($or_query)->all(),
                'link_type' => 'dillers',
                'field' => 'title_' . $this->lang,
            ];
            $results[] = [
                'title' =>'Сервисы диллеров',
                'items' => $queryDillersServices->andWhere($or_query)->all(),
                'link_type' => 'dillers',
                'field' => 'title_' . $this->lang,
            ];

            /*$results[] = [
                'title' => 'Компании',
                'items' => $queryCompanies->andWhere($or_query_text)->all(),
                'link_type' => 'link',
                'field' => 'title_' .$this->lang,
            ];
            $results[] = [
                'title' => 'Сотрудники',
                'items' => $queryCompanyUsers->andWhere($or_query_user)->all(),
                'link_type' => 'link',
                'field' => 'title_' .$this->lang,
            ];*/
            /*$results[] = [
                'title'=>'Диллеры', 
                'items' => $queryDillers->andWhere($or_query)->all(),
                'link_type' => 'link',
                'field' => 'title_' .$this->lang,
            ];*/


            $results[] = [
                'title'=>'История',
                'items' => $queryHistory->andWhere($or_query_text)->all(),
                'link_type' => 'history',
                'field' => 'title_' . $this->lang,
            ]
            ;
            $results[] = [
                'title'=>'Миссия',
                'items' => $queryMissions->andWhere($or_query)->all(),
                'link_type' => 'missions',
                'field' => 'title_' . $this->lang,
            ];

            $results[] = [
                'title'=>'Вакансии',
                'items' => $queryVacancy->andWhere($or_query)->all(),
                'link_type' => 'vacancy',
                'field' => 'title_' . $this->lang,
            ];

            $results[] = [
                'title' => 'Вопросы и ответы',
                'items' => $queryFaqs->andWhere($or_query)->all(),
                'link_type' => 'faq',
                'field' => 'title_' . $this->lang,
            ];

            // echo $queryProducts->createCommand()->getRawSql();
            /* $pagination = new Pagination([
                'totalCount' => $queryProducts->count(),
                'defaultPageSize'=>24,
            ]);
            
            if( ! $modelProducts = $queryProducts->offset($pagination->offset)->limit($pagination->limit)->all() ) {
                $modelProducts = false;
                $find++;
            } */
            
        /* }else{
            $modelProducts = false;
            $find = 3;
            $pagination = null; */
        }
        /*if( count($results) ) { //$find==3) { // если вообще нет совпадений
            $find = true;
        }else{
            $find = false;
        }*/
        return $this->render('search', [
            'results' => $results,
            // 'is_find' => $find,
            'query' => $query ,
            'lang' => $this->lang,
            //'pagination' => $pagination,
        ]);
    }


    public function actionPartnership()
    {
        $post = Yii::$app->request->post();
        if ( isset($post['Partners']['name']) ) {
            $partner = new Partners();
            if( $partner->load($post) ){
               if($partner->save()) {
                    Yii::$app->session->setFlash('info',Yii::t('app','Ваша заявка успешно отправлена!'));
                    return $this->refresh();
                }
            }
        }
        return $this->render('partnership', [
           // 'companies' => $companies,
        ]);
    }

    public function actionGetPartners(){
        $this->layout = false;
        $post = Yii::$app->request->post();
        if( isset($post['id']) ){
            $region_id = (int)$post['id'];
            if( $companies = Companies::find()->with('region')->where(['region_id'=>$region_id])->all() ){
                $view = $this->renderPartial('ajax-partnership-item',[
                   'companies' => $companies,
                ]);
                return json_encode(['status'=>1,'result'=>$view]);
            }
        }
        return json_encode(['status'=>0,'result'=>'Не найдено!']);
    }

    // список категорий для твоаров
    public function actionLocalization(){
        if( !$categories = Categories::find()->where(['!=','parent_id','0'])->all() ){
            $categories = false;
        }


        return $this->render('localization', [
            'lang' => $this->lang,
            'categories' => $categories,
        ]);
    }

    // выбранный товар
    public function actionLocalizationItem($link,$sub_link){
        if( $category = Categories::find()->where(['link_'.$this->lang => $sub_link])->with('parent')->one() ){
            if( ! $products = Products::find()->where(['status'=>1,'cat_id'=>$category->id])->all() ){
                $products = false;
            }
        }else{
            $category = false;
            $products = false;
        }


        return $this->render('localization-item', [
            'lang' => $this->lang,
            'category' => $category,
            'products' => $products,
        ]);
    }

    // ajax детали товара
    public function actionGetLocalization(){
        $post = Yii::$app->request->post();
        $id = (int) $post['id'];
        if( $product = Products::find()->with(['gallery','category'])->where(['status'=>1,'id'=>$id])->one() ){
            $view = $this->renderPartial('ajax_localization',[
                'product' => $product,
                'lang' => $this->lang,
            ]);
            return json_encode(['status'=>1,'html'=>$view],JSON_UNESCAPED_UNICODE);
        }
        return json_encode(['status'=>0]);
    }

    // ajax поиск по товару для вывода в слайдер товаров
    public function actionSearchLocalization(){

        $get = Yii::$app->request->get();

        $title = 'title_' . $this->lang;

        //$where = [];

        $_num = '';
        $_model = '';
        $_title = '';

         // and - и - обязательное совпадение всех заданных критериев, or - или, достаточно совпадений по всем опциям

        $or_query = ['or'];
        if( isset($get['num']) && $get['num']!='' ) {
            $_num = Html::encode( $get['num'] );
            $or_query[] = ['num' => $_num];
        }

        if( isset($get['model']) && $get['model'] != '' ) {
            $_model = Html::encode($get['model']);
            $res = explode(' ',$_model);
            foreach($res as $_item) {
                if($_item=='') continue;
                $or_query[] = ['like', 'model', $_item];
            }
        }

        if( isset($get['title']) && $get['title']!='' ) {
            $_title = Html::encode( $get['title'] );
            $res = explode(' ',$_title);
            foreach($res as $_item) {
                if($_item=='') continue;
                $or_query[] = ['like', $title, $_item];
            }
        }

        // $or_query[] = ['status' => 1];

        // print_r($or_query); exit;

        if( count( $or_query ) > 1 ) { // если задан фильтр

            //$where['status'] = 1;
            if( count($or_query)>0) {

                $products = Products::find()->where(['status'=>1])->andWhere($or_query)->all();

                //echo $products->createCommand()->getRawSql();
                //exit;


            }else{
                $products = Products::find()->where(['status'=>1])->all();
            }

            if( ! $products ) {

                /* $view = $this->renderPartial('search_localization',[
                    'products' => $products,
                    'lang' => $this->lang,
                ]); */

                $products = false;

                //return json_encode(['status'=>1,'html'=>$view],JSON_UNESCAPED_UNICODE);

            }
        }

        // echo '<pre>'; print_r([$where,$or_query,$products]);        exit;

        return $this->render('search_localization', [
            'lang' => $this->lang,
            'products' => $products,
            '_num' => strlen($_num)>0 ? $_num : '',
            '_model' => strlen($_model)>0 ? $_model : '',
            '_title' => strlen($_title)>0 ? $_title : '',
        ]);

        // return json_encode(['status'=>0]);

    }



    // ajax получение списка компаний
    public function actionGetCompanies(){

        $this->layout = false;

        $post = Yii::$app->request->post();

        if( isset($post['id']) ){

            $region_id = (int)$post['id'];
            if( $companies = Companies::find()->with(['managers','director','gallery'])->where(['region_id'=>$region_id])->all() ){

                $view  = $this->renderPartial('ajax-company',[
                    'companies' => $companies,
                    'lang' => $this->lang,
                ]);

                return json_encode(['status'=>1,'html'=>$view]);
            }


        }
        return json_encode(['status'=>0]);

    }

    // ajax отправка вопроса
    public function actionSendQuestion(){

        //$this->layout = false;

        $post = Yii::$app->request->post();

        $question = new Questions();

        if($question->load($post)) {

            //$question->user_id = (int)$post['id'];
            $question->date = time();
            $question->status = 0;
            if ($question->save()) {

                Yii::$app->session->setFlash('info',Yii::t('app', 'Ваша заявка успешно отправлена'));

            } else {

                $err = json_encode($question->getErrors(),256);
                Yii::$app->session->setFlash('info',Yii::t('app', 'Ошибка при отправке сообщения' . $err));
            }

        }

        return $this->redirect('/about/leadership'); // json_encode(['status'=>0]);

    }

    // ajax отправка на прием
    public function actionSendReception(){

        $this->layout = false;

        $post = Yii::$app->request->post();

        $reception = new Receptions();

        if( $reception->load($post) ){

            $reception->date = time();
            $reception->status = 0;
            if( $reception->save() ) {
                Yii::$app->session->setFlash('info',Yii::t('app', 'Ваша заявка успешно отправлена!'));

            }else{
                Yii::$app->session->setFlash('info', Yii::t('app', 'Ошибка при отправке сообщения'));

            }

        }


        return $this->redirect('/about/leadership'); // json_encode(['status'=>0]);

    }

    // ajax отправка данных для скачивания
    public function actionDownloadPrice(){

        $this->layout = false;

        $post = Yii::$app->request->post();

        $dprice = new DownloadPrice();

        $dprice->date = time();
        $dprice->username = @$post['name'];
        $dprice->email = @$post['email'];
        $dprice->phone = @$post['phone'];
        $dprice->company = @$post['company'];
        $dprice->status = 0;
        if( $dprice->save() ) {
            return json_encode(['status'=>1]);

        }

        return json_encode(['status'=>0]);

    }



    public function actionActions(){

        if( !$actions = Actions::find()->where(['status'=>1])->all() ){
            $actions = false;
        }

        return $this->render('actions', [
            'actions' => $actions,
            'lang' => $this->lang,
        ]);

    }

    public function actionActionItem($link=false){


        if( !$action = Actions::find()->where(['status'=>1,'link'=>$link])->one() ){
            $action = false;
        }

        return $this->render('action-item', [
            'link'=>$link,
            'action' => $action,
            'lang' => $this->lang,

        ]);

    }
	
	// new 

	public function actionServices(){

        return $this->render('services');

    }
	
	public function actionWarranty(){

        if( $data = Pages::find()->where(['page'=>'services-warranty'])->one() ){
            $data = json_decode($data->data);
        }else{
            $data = false;
        }

        return $this->render('warranty',[
            'data'=>$data,
            'lang'=>$this->lang,
        ]);

    }
	public function actionCentres(){

        if( $data = Pages::find()->where(['page'=>'services-centres'])->one() ){
            $data = json_decode($data->data);
        }else{
            $data = false;
        }

        return $this->render('centres',[
            'data'=>$data,
            'lang'=>$this->lang,
        ]);

    }
	public function actionSpareParts(){
        if( $data = Pages::find()->where(['page'=>'services-parts'])->one() ){
            $data = json_decode($data->data);
        }else{
            $data = false;
        }
        return $this->render('spare-parts',[
            'data'=>$data,
            'lang'=>$this->lang,
        ]);

    }
	public function actionServicesFaq(){
        if( $data = Pages::find()->where(['page'=>'services-faq'])->one() ){
            $data = json_decode($data->data);
        }else{
            $data = false;
        }
        return $this->render('services-faq',[
            'data'=>$data,
            'lang'=>$this->lang,
        ]);

    }
	public function actionLocalizationAbout(){
        if( $data = Pages::find()->where(['page'=>'localization-about'])->one() ){
            $data = json_decode($data->data);
        }else{
            $data = false;
        }
        return $this->render('localization-about',[
            'data'=>$data,
            'lang'=>$this->lang,
        ]);

    }



    /// создлание словаря
    public function actionDictionary(){

        $this->layout = false;

        $path = [];

        $path[] = Yii::getAlias('@frontend/views');

        // из controllers
        $path[] = Yii::getAlias('@frontend/controllers');

        // из моделей
        $path[] = Yii::getAlias('@common/models');

        $format = 'csv'; // доступные форматы csv, app.php



        FileHelper::createDictionary($path,$format);
        exit;

    }
	
}





