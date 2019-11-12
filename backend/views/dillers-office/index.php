<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DillersOfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Офисы дилера');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dillers-office-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]);

        $diller_id = (int)Yii::$app->request->get('diller_id');
        ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Офис дилера'), ['create','diller_id'=>$diller_id], ['class' => 'btn btn-success']) ?>
        <a href="/admin/dillers" class="btn btn-primary">Назад к дилерам</a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
            'title_ru',
            // 'title_uz',
            // 'title_en',
            // 'username_ru',
            // 'username_uz',
            // 'username_en',
            // 'doljnost_ru',
            // 'doljnost_uz',
            // 'doljnost_en',
            // 'phone',
            // 'text_ru',
            // 'text_uz',
            // 'text_en',
            // 'phones',
            // 'fax',
            // 'email:email',
            // 'site',
            // 'lat',
            // 'lon',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {delete}'
			],
        ],
    ]); ?>

</div>
