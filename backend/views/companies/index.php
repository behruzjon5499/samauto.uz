<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Руководители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <p>
        <?= Html::a('Добавить руководителя', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return '<img width="75px" src="/uploads/companies/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ],
            [
                'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            'name_ru',
            //'title_ru',
            //'name_en',
            //'text_ru',
            //'text_uz',
            //'text_en',
            //'address_ru',
            //'address_uz',
            //'address_en',
            //'title_ru',
            //'title_uz',
            //'title_en',
            //'phone',
            //'email:email',
            //'region_id',
            //'city_id',
            //'lat',
            //'lon',
            //'image',
            //'status',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
