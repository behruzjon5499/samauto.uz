<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/4/2018
 * Time: 3:23 PM
 */

namespace frontend\controllers;
use common\models\Dillers;
use common\models\Regions;
use yii\web\Controller;
use Yii;
//use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class DillersController extends Controller
{

    private $lang = 'ru';

    public function beforeAction($action)
    {
        $lang = Yii::$app->session->get('lang');
        if( $lang =='' ) $lang = 'ru';
        $this->lang = $lang;

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    // области для выбора региона с диллерами
    public function actionIndex(){

        if($_regions = Regions::find()->orderBy('name_ru ASC')->all()){
            $name = 'name_'.$this->lang;
            $regions = [];
            foreach ($_regions as $region){
                $regions[$region->id] = $region->$name;
            }
        }else{
            $regions = false;
        }

        return $this->render('index', [
            'lang' => $this->lang,
            'regions' => $regions,
        ]);
    }


    // выбранный регион
    public function actionRegion($region_id){

        if(!$dillers = Dillers::find()->where(['region_id' => $region_id,'status'=>1])->all()){
            $dillers = false;
        }
        if($region = Regions::findOne($region_id)) {
            $name = 'name_' . $this->lang;
            $region = $region->$name;
        }else{
            $region = '';
        }

        return $this->render('dillers-list', [
            'dillers'=>$dillers,
            'lang'=>$this->lang,
            'region' => $region,
        ]);
    }

    public function actionItem($id){

        if( ! $diller = Dillers::find()->with('office')->where(['id' => $id])->one() ){
            $diller = false;
        }

        if($region = Regions::findOne($diller->region_id)) {
            $name = 'name_' . $this->lang;
            $region = $region->$name;
        }else{
            $region = '';
        }
        return $this->render('item', [
            'diller'=>$diller,
            'lang'=>$this->lang,
            'region' => $region,

        ]);

    }

    protected function findModel($id)
    {
        if (($model = Dillers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}