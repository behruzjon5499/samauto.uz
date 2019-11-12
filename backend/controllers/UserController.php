<?php

namespace backend\controllers;

use common\models\CategoriesUsers;
use common\models\Comments;
use common\models\CommentsUsers;
use common\models\Messages;
use common\models\Rating;
use common\models\Services;
use common\models\Tags;
use common\models\TagsUsers;
use common\models\Userinfo;
use common\models\UserRating;
use Yii;
use common\models\Gallery;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'delete' => ['post'],
                ],
            ],
        ];
    }


    public function beforeAction($action){


        if(Yii::$app->user->isGuest){

            header('location:/admin/login');
            exit;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionManagers()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchAdmins(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /*public function actionOrganizations()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchOrganizations(Yii::$app->request->queryParams);

        return $this->render('index_org', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/



    /**
     * Displays a single User model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }




    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new User();

        $save = false;

        if ( $this->update( $model,true ) ){

            $save = true;
        }


        if($save)  return $this->redirect(['update', 'id' => $model->id]);

        return $this->render('create', [
            'model' => $model,
        ]);

    }

    // удаление изображения из галереи
    public function actionDeleteImage()
    {
        $id = (int)Yii::$app->request->post('id');
        $user_id = (int)Yii::$app->request->post('uid');
        $path = Yii::getAlias("@frontend/web/uploads/users/" . $user_id . '/' );
        if($user = User::find()->where(['id'=>$id,'status'=>1,'role'=>1])->one()) {
            $path .= $user->image;
            $user->image = '';
            $user->save();
            @unlink($path);
            echo json_encode(['status' => 1]);
        }else{
            echo json_encode(['status' => 0]);
        }
        exit;
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = User::find()->where(['id'=>$id])->one(); // $this->findModel($id);


        $saved = false;

        if ($this->update($model)){

            $saved = true;
        }


        if($saved){
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,

        ]);

    }

    private function update(&$model, $new=false){

        $post = Yii::$app->request->post();

        if( $model->load($post) ) {

            // выбранное изображение
            if( $file = UploadedFile::getInstance($model, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $path = Yii::getAlias("@frontend/web/uploads/users/{$model->id}/" );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb/')) @mkdir($path.'thumb/');

                if($model->isNewRecord) {
                    $fname = $model->image;
                }else{
                    // удалить старое изображение, нужно если разное расширение
                    @unlink($path . $model->image);
                    $fname = time() . '.' . $file->extension ;
                }

                // основная картинка - оригинал
                $file->saveAs($path . $fname );

                if(file_exists($path. $fname)){
                    // основное фото
                    Image::thumbnail($path . $fname, 200, 200)
                        ->save($path . $fname, ['quality' => 100]);

                    Image::thumbnail($path . $fname, 120, 120)
                        ->save($path . 'thumb/' . $fname, ['quality' => 100]);

                }
                $model->image = $fname;
                if(!$model->save()){
                    Yii::$app->session->setFlash('info-success','Ошибка при сохранении!');
                    return false;
                }
            }

            if(isset($post['Gallery']['title'])){
                // получаем все ключи
                $gal_ids = array_keys($post['Gallery']['title']);
                // вытаскиваем все галереи пользователя-user_id, для которых заданы титлы
                if( $gals = Gallery::find()->where(['id'=>$gal_ids,'user_id'=>$model->id])->all() ){
                    foreach ($gals as $gal) {
                        if(isset($post['Gallery']['title'][$gal->id])) {
                            $gal->title_ru = $post['Gallery']['title'][$gal->id];
                            $gal->save();
                        }
                    }
                }
            }



            if( get_class($model) == 'common\models\User'){

                if(isset($post['User']['password'])) {
                    $pw = @$post['User']['password'];
                    $pwc = @$post['User']['password_confirm'];

                    if ($pw == $pwc) {
                        // смена пароля пользователя

                        $user = User::findIdentity($model->id);
                        $user->setPassword($pw);
                        $user->password = $pw;
                        $user->generateAuthKey();
                        $user->save();

                    }
                }

            }

            if(!$model->save()) {
                Yii::$app->session->setFlash('info','Ошибка при сохранении!');
                return false;
            }

            Yii::$app->session->setFlash('info','Сохранение успешно!');
            return true;
        }

        return false;
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $path = Yii::getAlias('/frontend/web/uploads/');


       // Comments::deleteAll(['user_to'=>$id]);

        // здесь нужно удалять все файлы пользователя


        return $this->redirect(['index']);

    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
