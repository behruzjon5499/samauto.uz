<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanyUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-users-index">

    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'image',
                'format' => 'raw',
                'content'=>function($data){
                    return '<img width="75px" src="/uploads/company-users/'.$data->id.'/thumb/'.$data->image.'">';
                }
            ],
            [
                'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],


            //'company_id',
            'name_ru',
            //'secondname_ru',
            //'lastname_ru',
            //'firstname_uz',
            //'secondname_uz',
            //'lastname_uz',
            //'firstname_en',
            //'secondname_en',
            //'lastname_en',
            'doljnost_ru',

            //'doljnost_uz',
            //'doljnost_en',
            //'phone',
            //'email:email',
            //'site',
            //'days',
            //'contacts',
            //'image',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
</div>
