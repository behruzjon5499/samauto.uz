<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MissionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Миссии');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="missions-index">

    <?php /* <p>
        <?= Html::a(Yii::t('app', 'Добавить миссиию'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> */ ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'image',
                'format' => 'raw',
                'content'=>function($data){
                    return '<img width="150px" src="/uploads/missions/'.$data->id.'/'.$data->file .'">';
                }
            ],
            'num',
            'title_ru',
            //'data:ntext',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
