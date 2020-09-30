<?php

use backend\helpers\Statushelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Историй';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <p>
        <?= Html::a('Добавить Историю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'title_ru',
             'descr_ru',
            [
                'attribute' => 'preview_img',
                'value' => function($model) {
                    return $model->preview_img ? '<img src="/uploads/career/history/'. $model->preview_img .'" width="100px">' : '<img src="/uploads/career/history/no-image.png" width="100px">';
                },
                'format' => 'html'
            ],
//            [
//            'attribute' => 'status',
//            'filter'=> ['1' => 'Включен', '0' => 'Отключен'],
//            'content'=>function($data){
//                return Statushelper::status($data);
//            }
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
