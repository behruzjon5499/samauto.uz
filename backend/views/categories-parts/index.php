<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="categories-index">

    <p>
        <?= Html::a('Добавить категорию для Запчастей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           /* [
                'attribute'=>'image',
                'format' => 'raw',
                'content'=>function($data){
                    return '<img src="/uploads/products/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ], */
            //'parent_id',
            //'type',
            'title_ru',
            //'link',
            [ 'attribute' => 'category',
                'content'=>function($model){

                    if($model->parent==0){
                        $parent = ''; //'Корневая';
                    }else{
                        $parent =  $model->parent->title_ru . ' / ';
                    }

                    return $parent . $model->title_ru ;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
</div>
