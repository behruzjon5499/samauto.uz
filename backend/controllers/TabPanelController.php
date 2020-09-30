<?php

namespace backend\controllers;

use common\models\TransportSearch;
use Yii;
use common\models\TabPanel;
use common\models\TabPanelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TabPanelController implements the CRUD actions for TabPanel model.
 */
class TabPanelController extends Controller
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
     * Lists all TabPanel models.
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
        $searchModel = new TabPanelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['transport_id' =>$id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new TabPanel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabPanel();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
//            VarDumper::dump($model,12,true);
//            die();
            if (!empty($_FILES['TabPanel']['name']['image'])) {
                $model->image = $_POST['TabPanel']['image'];
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->upload();
                $model->save(false);
            } else {
                $model->save();
            }
            return $this->redirect(['index']);
        }
            return $this->render('create', [
                'model' => $model,
            ]);

    }

    /**
     * Updates an existing TabPanel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!empty($_FILES['TabPanel']['name']['image'])) {
                $model->image = $_POST['TabPanel']['image'];
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
     * Deletes an existing TabPanel model.
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
     * Finds the TabPanel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabPanel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabPanel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    


}
