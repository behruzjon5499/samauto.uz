<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-index">


    <p>
        <?= Html::a('Добавить город', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'country_id',
                'format' => 'html',
                'filter' => '',
                'content'=>function($data) {
                    return @$data->country->name;
                }
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}'
			],        ],
    ]); ?>

</div>
