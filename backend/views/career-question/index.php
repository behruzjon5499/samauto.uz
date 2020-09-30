<?php

use backend\helpers\Statushelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <p>
        <?= Html::a('Добавить Вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             'fullname',
             'phone',
            [
                'attribute' => 'status',
                'filter'=> ['1' => 'Просмотрен', '0' => 'Не просмотрен'],
                'content'=>function($data){
                    return Statushelper::view($data);
                }
            ],
//             'message',
//            'updated_at:datetime',
//            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
