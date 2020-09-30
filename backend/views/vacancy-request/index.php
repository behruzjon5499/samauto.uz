<?php

use common\models\VacancyRequest;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <p>
        <?= Html::a('Добавить Заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vacancy.title_ru',
             'firstname',
             'secondname',
             'thirdname',
             'phone',
            [
                'attribute' => 'status',
                'filter' => \backend\helpers\Request::statusList(),
                'value' => function (VacancyRequest $model) {
                    return \backend\helpers\Request::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
