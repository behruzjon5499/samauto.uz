<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Вакансии');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить вакансию'), ['create'], ['class' => 'btn btn-success']) ?>
        <a href="/admin/vacancy-category/create" class="btn btn-success">Добавить категорию</a>
        <a href="/admin/vacancy-category" class="btn btn-success">Все категории</a>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'category_id',
            // 'title_uz',
            // 'title_en',
            // 'text_ru:ntext',
            // 'text_uz:ntext',
            // 'text_en:ntext',

            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],

            'title_ru',

            [ 'attribute' => 'category_id',
            'content'=>function($data){
                return  $data->category->title_ru;
            }
            ],
        
            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
