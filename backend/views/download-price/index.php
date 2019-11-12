<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DownloadPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Скачивание прайса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="download-price-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',

            // 'username',
            // 'email:email',
            // 'company',
            // 'phone',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
            'date:date',
            'username',
            'email:email',
            'company',
            'phone',
        
            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
