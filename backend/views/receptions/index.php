<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ReceptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запись на прием';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receptions-index">


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
            ['attribute' => 'date',
                'filter'=>false,
            'content'=>function($data){
                return  date('H:i / d.m.Y',$data->date);
            }
            ],
            ['attribute' => 'user_id',
                'filter'=>false,
                'content'=>function($data){
                return  $data->user->name_ru . ' (' .$data->user->doljnost_ru . ')';
            }
            ],
            ['attribute' => 'username',
                'filter'=>false,
                'content'=>function($data){
                    return  $data->username;
                }
            ],
            ['attribute' => 'subject',
                'filter'=>false,
                'content'=>function($data){
                    return  $data->subject;
                }
            ],
            ['attribute' => 'phone',
                'filter'=>false,
                'content'=>function($data){
                    return  $data->phone;
                }
            ],
            //'username',
            //'subject',
            // 'company',
            // 'email:email',
            //'phone',
            // 'text',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
