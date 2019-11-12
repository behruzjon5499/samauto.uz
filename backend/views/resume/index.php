<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
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
            'name',
            [
                'attribute' => 'file',
                'content'=>function($data){
                    return  '<a href="/uploads/resume/'.$data->id .'/' .$data->file .'" download="">Скачать</a>';
                }
            ],
             // 'file',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
