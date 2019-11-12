<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CarsSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Слайдер авто');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-slider-index">


    <p>
        <?= Html::a(Yii::t('app', 'Добавить слайдер'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'image',
                'format' => 'raw',
                'content'=>function($data){
                    return '<img width="150px" src="/uploads/cars-slider/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ],
            [   'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.',],
                'content'=>function($model){
                    return  $model->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            [   'attribute' => 'category_id',
                //'filter'=> ['1' => 'Вкл.', '0' => 'Откл.',],
                'content'=>function($model){
                    return  isset($model->category) ? $model->category->title_ru : '';
                }
            ],
            'title_ru',
            //'title_uz',
            //'title_en',
            //'text_ru',
            //'text_uz',
            //'text_en',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
