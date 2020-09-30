<?php

namespace backend\controllers;

use Yii;
use common\models\Dillers;
use common\models\DillersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DillersController implements the CRUD actions for Dillers model.
 */
class DillersController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
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
     * Lists all Dillers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DillersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Dillers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dillers([
            'file_cert' => ''
        ]);

        if ($model->updateModel(true)) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dillers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->updateModel()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {

        
            return $this->render('update', [
                'model' => $model,
                            ]);
        }
    }

    /**
     * Deletes an existing Dillers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        if($model = Dillers::find()->with(['office','services'])->where(['id'=>$id])->one()){


            if( @count($model->office) > 0 ){
                Yii::$app->session->setFlash('info','У дилера имеются офисы, необходимо сначала их удалить!');
                return $this->redirect(['index']);
            }

            if( count($model->services) > 0 ){
                Yii::$app->session->setFlash('info','У дилера имеются сервисные центры, необходимо сначала их удалить!');
                return $this->redirect(['index']);
            }

            $model->delete();
        }


        return $this->redirect(['index']);

    }

    /**
     * Finds the Dillers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dillers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dillers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    // удаление файла сертификата
    public function actionDeleteFile()
    {
        $id = (int)Yii::$app->request->post('id');

        if( $page = Dillers::findOne($id) ) {

            $path = Yii::getAlias("@frontend/web/uploads/dillers/{$id}/");

            @unlink($path . $page->file_cert);

            $page->file_cert = '';

            if( $page->save()) return json_encode(['status' => 1]);

        }

        return json_encode(['status'=>0]);
    }


}
