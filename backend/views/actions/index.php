<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ActionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-index">

     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить акции', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            // 'date_start',
            // 'date_end',
            // 'created_at',
            [
                'attribute'=>'image',
                'filter'=>false,
                'content'=>function($data){
                    return '<img width="150px" src="/frontend/web/uploads/actions/'.$data->id.'/'.$data->image.'">';
                }
            ],
            // 'link',

            // 'title_uz',
            // 'title_en',
            // 'text_ru:ntext',
            // 'text_uz:ntext',
            // 'text_en:ntext',
            [
                'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            'title_ru',
            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
