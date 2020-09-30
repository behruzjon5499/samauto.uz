<?php

namespace backend\controllers;

use common\models\VacancySend;
use common\models\VacancySendSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * VacancySendController implements the CRUD actions for VacancySend model.
 */
class VacancySendController extends Controller
{
    public $layout = 'main-career';
    const STATUS_WAIT = 0;
    const STATUS_ACTIVE = 10;

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
     * Lists all VacancySend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VacancySendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new VacancySend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VacancySend();

        if ($model->updateModel(true)) {
            Yii::$app
                ->mailer
                ->compose(['html' => 'send/confirm-html', 'text' => 'send/confirm-text'])
                ->setFrom('no-reply@samauto.uz')
                ->setTo($model->friend_email)
                ->setSubject('Welcome to samauto')
                ->send();
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VacancySend model.
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
     * Deletes an existing VacancySend model.
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
     * Finds the VacancySend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = VacancySend::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionActive($id)
    {
        $vacancyrequest = VacancySend::find()->where(['id' => $id])->one();
        $vacancyrequest->status = self::STATUS_ACTIVE;
        $vacancyrequest->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $vacancyrequest,
        ]);
    }

    public function actionWait($id)
    {
        $vacancyrequest = VacancySend::find()->where(['id' => $id])->one();
        $vacancyrequest->status = self::STATUS_WAIT;
        $vacancyrequest->save(false);
        return $this->render('view', [
            'id' => $id,
            'model' => $vacancyrequest,
        ]);
    }


}
