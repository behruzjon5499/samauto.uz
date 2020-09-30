<?php

namespace backend\controllers;

use common\models\IrbisGallery;
use common\models\IrbisGallerySearch;
use common\models\TabPanelSearch;
use common\models\TransportSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * IrbisGalleryController implements the CRUD actions for IrbisGallery model.
 */
class IrbisGalleryController extends Controller
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

    /**
     * Lists all IrbisGallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('transportindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexTab($id)
    {
        $searchModel = new IrbisGallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['transport_id' =>$id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }


    /**
     * Creates a new IrbisGallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new IrbisGallery();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['IrbisGallery']['name']['image'])) {
                $model->transport_id =  $id;
                $model->image = $_POST['IrbisGallery']['image'];
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->upload();
                $model->save(false);

            } else {
                $model->save();
            }
            return $this->redirect(['create' ,'id' =>$id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);

    }

    /**
     * Updates an existing IrbisGallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['IrbisGallery']['name']['image'])) {
                $model->image = $_POST['IrbisGallery']['image'];
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->upload();
                $model->save(false);
            } else {
                $model->save();
            }
            return $this->redirect(['index']);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing IrbisGallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IrbisGallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IrbisGallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IrbisGallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
