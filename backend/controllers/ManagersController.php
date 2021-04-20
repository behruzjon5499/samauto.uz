<?php

namespace backend\controllers;

use common\models\CategoriesUsers;
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
class ManagersController extends Controller
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
        $dataProvider = $searchModel->searchAdmins(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['<>','id',2]);
        return $this->render('@backend/views/user/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all User models.
     * @return mixed
     */
   /* public function actionManagers()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchAdmins(Yii::$app->request->queryParams);

        return $this->render('@backend/views/user/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } */

    /*public function actionOrganizations()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->searchOrganizations(Yii::$app->request->queryParams);

        return $this->render('index_org', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/


    public function actionCreateAdmin()
    {
        $model = new User();

        if ($this->update($model,true)){

            return $this->redirect(['/managers' /* , 'id' => $model->id */ ]);

        }

        return $this->render('@backend/views/user/create', [
            'model' => $model,
            'type' => 1,
            'user_title' => 'пользователя',
        ]);

    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = User::find()->where(['id'=>$id])/*->with(['gallery'])*/->one();// $this->findModel($id);
        $saved = false;

        if ($this->update($model)){

            $saved = true;
        }

        if($saved){
            return $this->redirect(['update', 'id' => $id]);
        }

        return $this->render('@backend/views/user/update', [
            'model' => $model,
            //'rating' => $rating,
           // 'user_info' => $user_info,

            'searchModel' => false,
            'dataProvider' => false,
        ]);

    }

    private function update(&$model, $new=false){

        $post = Yii::$app->request->post();

        if( $model->load($post) ) {

            $model->save();

            // выбранное изображение
            if( $file = UploadedFile::getInstance($model, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $path = Yii::getAlias("@frontend/web/uploads/users/{$model->id}/" );
                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb/')) @mkdir($path.'thumb/');

                $fname = time() . '.' . $file->extension ;

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


            if(isset($post['User']['password'])) {
                $pw = @$post['User']['password'];

                // смена пароля пользователя
                $model->password = $pw;
                $model->setPassword($pw);
                $model->generateAuthKey();
                if(!$model->save()){
                    print_r( [$post,$model->getErrors()] );
                    exit;
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

        $path = Yii::getAlias('@frontend/web/uploads/');

        
        // Comments::deleteAll(['user_to'=>$id]);
        //CommentsUsers::deleteAll(['user_to'=>$id]);

        // здесь нужно удалять все файлы пользователя
        

        return $this->redirect(['managers/index']);

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
