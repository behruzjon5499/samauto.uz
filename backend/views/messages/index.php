<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php /* <p>
        <?= Html::a('Create Messages', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -*/ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [   'attribute' => 'status',
                'filter'=> ['1' => 'Прочитано', '0' => 'Не прочитано',],
                'content'=>function($model){
                    return  $model->status ? '<span class="label label-success">Прочитано</span>' : '<span class="label label-danger">Не прочитано</span>';
                }
            ],
            'date'=>[
                'label'=>Yii::t('app','Дата'),
                'content'=>function($data){
                    return date('d.m.Y',$data->date);
                }
            ],
            [   'attribute' => 'type',
                'filter'=> ['0' => 'Из контактов'],
                'content'=>function($model){
                    $_type = ['Из контактов'];
                    return  $_type[$model->type];
                }
            ],
            //'date_view',
            'name',
            // 'email:email',
            // 'status',
            // 'type',
            // 'msg',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'

            ],
        ],
    ]); ?>

</div>
