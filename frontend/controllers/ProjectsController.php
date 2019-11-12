<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/4/2018
 * Time: 3:23 PM
 */

namespace frontend\controllers;
use common\models\Projects;
use common\models\ProjectsOrder;
use yii\imagine\Image;
use yii\web\Controller;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProjectsController extends Controller
{

    public function actionIndex(){

        $post = Yii::$app->request->post();

        //print_r($post); exit;
        // сохранение пользовательского заказа
        if( isset($post['ProjectsOrder']['name']) ) $this->saveOrder($post);

        $query = Projects::find()->where(['status'=>1,'top'=>0])->orderBy('date ASC');

        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize'=>12]);

        if(! $projects = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all() ){
            $projects = false;
        }

        if( ! $projects_top = Projects::find()->where(['status'=>1,'top'=>1])->orderBy('date ASC')->limit(3)->all() ){
            $projects_top = false;
        }

        /*if( $info = Yii::$app->session->getFlash('info')){
            echo $info;
            exit;
        } */

        return $this->render('index', [
            'projects' => $projects,
            'projects_top' => $projects_top,
            'pages' => $pages,
        ]);
    }


    public function actionItem($link){
        $lang = Yii::$app->session->get('lang');
        if($lang=='') $lang = 'ru';

        $project = Projects::find()->with('gallery')->where(['link_'.$lang=>$link])->one();

        return $this->render('projectItem', [
            'project'=>$project,
        ]);
    }

    private function saveOrder(&$post){

        $project_order = new ProjectsOrder();

        if($project_order->load($post) ){

            $project_order->status = 0;
            $project_order->save();

            // сохранение изображения

            if( $file = UploadedFile::getInstance($project_order, 'tmp_image' ) ){

                if( ! preg_match('/image\//',$file->type) ) return false; // загружена не картинка!

                $fname = time() . '.' . $file->extension;

                $path = Yii::getAlias("@frontend/web/uploads/projects-orders/" . $project_order->id . '/' );


                if(!is_dir($path)) @mkdir($path);
                if(!is_dir($path.'thumb')) @mkdir($path .'thumb');

                // основная картинка - оригинал
                $file->saveAs($path . $fname );
                $filepath = $path . $fname ;

                // эскиз
                Image::thumbnail($filepath, 200, 200)
                    ->save($path . 'thumb/' . $fname , ['quality' => 100]);

                // удалить оригинал 'orig_'
                //@unlink($filepath);

                $project_order->image = $fname;
                if(!$project_order->save()){
                    //print_r($model->getErrors());
                    return false;
                    exit;
                }

            }

            if( $project_order->save() ){

                Yii::$app->session->setFlash('info', Yii::t('app','Ваш заказ принят! Мы свяжемся с вами в ближайшее время.') );

            }
        }

    }



}