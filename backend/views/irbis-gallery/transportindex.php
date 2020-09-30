<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'image',
                'content'=>function($data){
                    return '<img width="150px" src="/uploads/transport/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ],
            [
                'attribute' => 'title_ru',
                'value' => function (\common\models\Transport $data) {
                    return Html::a($data->title_ru, ['irbis-gallery/index-tab', 'id' => $data->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'model',
                'value' => function (\common\models\Transport $data) {
                    return Html::a($data->model, ['irbis-gallery/index-tab', 'id' => $data->id]);
                },
                'format' => 'raw',
            ],

//
//            ['class' => 'yii\grid\ActionColumn',
//                'template'=>'{update} {delete}'
//            ],
        ],
    ]); ?>

</div>


