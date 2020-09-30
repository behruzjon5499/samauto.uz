<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PikupsPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pikups Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pikups-page-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Pikups Page'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'gallery_image',
                'value' => function($model) {
                    return $model->gallery_image ? '<img src="/uploads/pikups-page/'. $model->gallery_image .'" width="100px">' : '<img src="/uploads/irbis-gallery/no-image.png" width="100px">';
                },
                'format' => 'html'
            ],

            // 'gallery_image',
            // 'irbis_image',
             'youtube_link',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
