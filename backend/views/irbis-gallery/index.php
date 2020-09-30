<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IrbisGallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $id yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Irbis Galleries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="irbis-gallery-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Irbis Gallery'), ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
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
                    return $model->photo ? '<img src="/uploads/irbis-gallery/'. $model->photo .'" width="100px">' : '<img src="/uploads/irbis-gallery/no-image.png" width="100px">';
                },
                'format' => 'html'
            ],
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
        
            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
