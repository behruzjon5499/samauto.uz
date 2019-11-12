<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\QuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-index">



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'user_id',
            // 'date',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Прочтен', '0' => 'Не прочтен'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Прочтен</span>' : '<span class="label label-danger">Не прочтен</span>';
            }
            ],
            [
            'attribute' => 'date',
            'content'=>function($data){
                return  date('d.m.Y / H:i',$data->date);
            }
            ],
            'username',
            'subject',
            // 'company',
            // 'email:email',
            'phone',
            // 'text',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
