<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TabPanelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tab Panels');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-panel-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Tab Panel'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'photo',
                'value' => function($model) {
                    return $model->photo ? '<img src="/uploads/tab-panel/'. $model->photo .'" width="100px">' : '<img src="/uploads/tab-panel/no-image.png" width="100px">';
                },
                'format' => 'html'
            ],
             'title_ru',
             'title_uz',
             'title_en',
            [
                'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            // 'content_ru:ntext',
            // 'content_uz:ntext',
            // 'content_en:ntext',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
