<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Области';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-index">

    <p>
        <?= Html::a('Добавить область', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'name_ru',

            ['class' => 'yii\grid\ActionColumn',
				'template' => '{update} {delete}'
			],
		],
    ]); ?>

</div>
