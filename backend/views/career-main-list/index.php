<?php

use backend\helpers\Statushelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $dataProviderMain yii\data\ActiveDataProvider */

$this->title = 'Основная страница';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <div class="first">
        <?= GridView::widget([
            'dataProvider' => $dataProviderMain,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title_ru',
                'title_uz',
                'title_en',
                [
                    'attribute' => 'main_img',
                    'value' => function($model) {
                        return $model->main_img ? '<img src="/uploads/career/main/'. $model->main_img .'" width="100px">' : '<img src="/uploads/career/main/no-image.png" width="100px">';
                    },
                    'format' => 'html'
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url,$model,$key) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view-main', 'id' => $model->id]);
                        },
                        'update' => function ($url,$model,$key) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update-main' , 'id' => $model->id]);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

    <br>
    <br>


    <div class="second">
        <h1>Список</h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title_ru',
                'title_uz',
                'title_en',
                [
                    'attribute' => 'preview_img',
                    'value' => function($model) {
                        return $model->preview_img ? '<img src="/uploads/career/main/'. $model->preview_img .'" width="100px">' : '<img src="/uploads/career/main/no-image.png" width="100px">';
                    },
                    'format' => 'html'
                ],

                ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}'],
            ],
        ]); ?>
    </div>

</div>
