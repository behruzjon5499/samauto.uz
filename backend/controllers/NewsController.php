<?php

namespace backend\controllers;

use common\models\NewsGallery;
use common\models\NewsGallerySearch;
use Yii;
use common\models\News;
use common\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\helpers\TextHelper;



use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            header('location:/admin/login');
            exit;
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new News();

        if ($model->updateModel($model, true) ) {
            return $this->redirect(['index']);
        }



        return $this->render('create', [
            'model' => $model,

        ]);
    }


    /**
     * Updates an existing Companies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if( $model->updateModel($model) ){
            return $this->redirect(['update', 'id' => $model->id]);

        }else{

            $searchModel = new NewsGallerySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('update', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }
    }


   /* private function update(&$model, $new=false){

        $image = 'tmp_image';

        $post = Yii::$app->request->post();
//        echo '<pre>';        print_r([$post,$_FILES]);        echo '</pre>';
//        exit;
        if($model->load($post) ) {

            if( $new ){ // если создается
                // только один раз при создании
                $model->date = time();
            }

            $model->link_ru = TextHelper::Transliterate( $post['News']['title_ru'] );
            $model->link_uz = TextHelper::Transliterate( $post['News']['title_uz'] );
            $model->link_en = TextHelper::Transliterate( $post['News']['title_en'] );

            //$model->date = strtotime($post['News']['date'],time());
            //print_r($post); exit;

            if( !$model->save() ){
                Yii::$app->session->setFlash('info-error','Ошибка при сохранении документа!');
                print_r($model->getErrors());
                exit;

                return true;
            }


            // сохранение изображения

            if( $file = UploadedFile::getInstance($model, $image ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                // echo 'загружен файл типа: '.$file->type; exit;


                $fname = time() . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс

                $path = Yii::getAlias("@frontend/web/uploads/news/" . $model->id . '/' );


                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                // основная картинка - оригинал
                $file->saveAs($path . $fname );
                $filepath = $path . $fname ;

                // эскиз
                Image::thumbnail($filepath, 280, 350)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // эскиз
                Image::thumbnail($filepath, 500, 300)
                    ->save($path . $fname , ['quality' => 100]);

                // удалить оригинал 'orig_'
                //@unlink($filepath);

                $model->image = $fname;
                if(!$model->save()){
                    //print_r($model->getErrors());
                    return false;
                    exit;
                }

            }

            Yii::$app->session->setFlash('info-success','Новость успешно сохранена!');

            //Yii::$app->cache->delete('news');

            return true;
        }
        return false;
    } */

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        if( $model = $this->findModel($id) ) {

            $path = Yii::getAlias("@frontend/web/uploads/");

            // удаляем фото
            @unlink($path .'news/' . $model->id . '/' . $model->image);
            @unlink($path .'news/' . $model->id . '/thumb/' . $model->image);

            $model->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}