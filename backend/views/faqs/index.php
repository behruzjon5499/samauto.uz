<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FaqsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопросы и ответы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Вопрос/Ответ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'type',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
            'title_ru',
            [
            'attribute' => 'type',
            'filter'=> ['1' => 'Процесс покупки', '2' => 'Эксплуатация и обслуживание','3'=>'Документация'],
            'content'=>function($data){
                $_type[0] = Yii::t('app','Не задано');
                $_type[1] = Yii::t('app','Процесс покупки');
                $_type[2] = Yii::t('app','Эксплуатация и обслуживание');
                $_type[3] = Yii::t('app','Документация');

                return  $_type[$data->type];
            }
            ],

            // 'title_uz',
            // 'title_en',
            // 'text_ru',
            // 'text_uz',
            // 'text_en',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
