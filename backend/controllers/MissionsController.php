<?php

namespace backend\controllers;

use Yii;
use common\models\Missions;
use common\models\MissionsSearch;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MissionsController implements the CRUD actions for Missions model.
 */
class MissionsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Missions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MissionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Creates a new Missions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Missions();

        if ($this->updateModel($model,true)) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Missions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->updateModel($model) ) {

             return $this->redirect(['update', 'id' => $model->id]);

        }

        /* $data[] = [
          'title_ru' => 'title_ru',
          'text_ru' => 'text_ru',
          'title_uz' => 'text_uz',
          'text_uz' => 'text_uz',
          'title_en' => 'text_en',
          'text_en' => 'text_en',

        ];  */

        $data = json_decode( $model->data,true );

        return $this->render('update', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    public function updateModel(&$model, $is_new = false )
    {
        $post = Yii::$app->request->post();

        if( $model->load($post) ) {

           if($is_new)  $model->save(); // чтобы получить model->id для фото

            if ($post['remove-mission'] != '') {
                $keys = explode(',', trim($post['remove-mission'], ','));
                foreach ($keys as $key) {
                    unset($post['MissionsItems'][$key]);
                }
            }

            // echo '<pre>'; print_r([$post,$_FILES]); exit;

            // сохранение изображения

            if( $file = UploadedFile::getInstance($model, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                // echo 'загружен файл типа: '.$file->type; exit;

                $fname = time() . '.' . $file->extension; // preg_replace('/tmp_/','',$image); //  убрать префикс

                $path = Yii::getAlias("@frontend/web/uploads/missions/" . $model->id . '/' );

                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                // основная картинка - оригинал
                $file->saveAs($path . $fname );
                $filepath = $path . $fname ;

                // эскиз
                /* Image::thumbnail($filepath, 345, 230)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]); */

                // эскиз
                Image::thumbnail($filepath, 345, 230)
                    ->save($filepath , ['quality' => 100]);

                $model->file = $fname;
                if( ! $model->save() ){
                    print_r($model->getErrors());
                    return false;
                    exit;
                }


            }

            /* if (isset($post['MissionsItems']['new'])) {
                // $cnt = count($post['MissionsItems']);
                // if ($cnt > 0) $cnt--;
                // if($cnt>0) $cnt--;
            } */
           // echo '<pre>';            print_r($post);            echo '</pre>';

            // перестраиваем массив по ключу
            $k = -1;
            foreach( $post['MissionsItems'] as $key=>$item ){
                $k++;
                $data[$k] = $post['MissionsItems'][$key];
                //unset( $post['MissionsItems'][$key] ); // удалить
            }

            $model->data = json_encode($data, JSON_UNESCAPED_UNICODE);


            if ( $model->save() ) {
                // echo '<pre>';                print_r($post);                echo '</pre>';                exit;
                return true;
            }
        }

        return false;

    }


    /**
     * Deletes an existing Missions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Missions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Missions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Missions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
