<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DillersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Дилеры');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .padding-left{
        padding-left: 10px;
    }
    </style>
<div class="dillers-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить дилера'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'region_id',
            [
            'attribute' => 'status',
            'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
            'content'=>function($data){
                return  $data->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
            }
            ],
            // 'title_uz',
            // 'title_en',
            // 'link_ru',
            // 'link_uz',
            // 'link_en',
            // 'text_ru',
            // 'text_uz',
            // 'text_en',
            // 'address_ru',
            // 'address_uz',
            // 'address_en',
            // 'phone',
            // 'email:email',
            // 'site',

            [
            'attribute'=>'image',
            'content'=>function($data){
                return '<img width="150px" src="/uploads/dillers/'.$data->id.'/thumb/'.$data->image.'">';
            }
            ],
            'title_ru',
            [
                'attribute' => 'region_id',
                //'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    return  @$data->region->name_ru;
                }
            ],
            [
                'attribute' => 'offices-dillers',
                'label'=>'',
                //'filter'=> ['1' => 'Вкл.', '0' => 'Откл.'],
                'content'=>function($data){
                    $office = count($data->officeAll);
                    $services = count($data->servicesAll);
                    return 'Офисов: ' . $office . '<br>Сервисов: '. $services;//@$data->region->name_ru;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{update} {office} {service} {delete}',
                'buttons' => [
                    'update'=>function($url,$data){
                        return '<a href="/admin/dillers/update?id=' . $data->id . '" class="padding-left" title="Изменить"><i class="fa fa-pencil"></i></a>';
                    },
                    'office'=>function($url,$data){
                        return '<a href="/admin/dillers-office?diller_id=' . $data->id . '" class="padding-left" title="Офисы"><i class="fa fa-building"></i></a>';
                    },

                    'service'=>function($url,$data){
                        return '<a href="/admin/dillers-services?diller_id=' . $data->id . '" class="padding-left" title="Сервисы"><i class="fa fa-cog"></i></a>';
                    },

                    'delete'=>function($url,$data){
                        return '<a href="/admin/dillers/delete?id=' . $data->id . '" class="padding-left delete-service" title="Удалить"><i class="fa fa-trash"></i></a>';
                    },

                ]

			],
        ],
    ]); ?>

</div>
<?php $script = "$(document).ready(function(){
    
    $(document).ready(function(){
        $('.delete-service').click(function(e){
            e.preventDefault();
            if(!confirm('Подтвердить удаление!')) return false;
            window.location.href = $(this).attr('href');
        });
    });
    
});";
$this->registerJs($script, yii\web\View::POS_END);

