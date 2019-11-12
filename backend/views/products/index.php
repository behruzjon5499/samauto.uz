<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Локализация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
               'attribute'=>'image',
               'filter' => false,
               'format' => 'raw',
               'content'=>function($data){
                   return '<img src="/uploads/products/'.$data->id.'/thumb/'.$data->image.'">';
               }
            ],
            [   'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.',],
                'content'=>function($model){
                    return  $model->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            'num',
            'title_ru',
            //'link',
            [ 'attribute' => 'cat_id',
                'filter' => false,
                'content'=>function($model){
                    return  @$model->category->parent->title_ru . '<br>' . @$model->category->title_ru ;
                }
            ],

            //'brand_id',
            //'added_date:date',
            //'sale',
            //'text',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
</div>
