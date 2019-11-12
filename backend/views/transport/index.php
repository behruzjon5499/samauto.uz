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

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Transport'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'image',
                'content'=>function($data){
                    return '<img width="150px" src="/frontend/web/uploads/transport/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ],
            // 'id',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
            [
                'attribute'=>'type',
                'filter' =>[0=>'Автобус',1=>'Грузовики',2=>'Спецтехника'],
                'content'=>function($data){
                    $_type[0] = 'Автобус';
                    $_type[1] = 'Грузовики';
                    $_type[2] = 'Спецтехника';
                    return $_type[$data->type];
                }
            ],
                    // 'type',
            // 'type_id',
            // 'category_id',
            'title_ru',
            'model',
            'pos',


            // 'title_uz',
            // 'title_en',

                    // 'data:ntext',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
