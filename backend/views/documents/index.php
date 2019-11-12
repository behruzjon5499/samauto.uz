<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">


    <p>
        <?= Html::a('Добавить документ', ['create'], ['class' => 'btn btn-success']) ?>
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
                    if($data->type==0) {
                        return '<img width="60px" src="/uploads/documents/' . $data->id . '/thumb/' . $data->file . '">';
                    }else{
                        return '<img width="60px" src="/uploads/file.png">';
                    }
                }
            ],
            [   'attribute' => 'status',
                'filter'=> ['1' => 'Вкл.', '0' => 'Откл.',],
                'content'=>function($model){
                    return  $model->status ? '<span class="label label-success">Вкл.</span>' : '<span class="label label-danger">Откл.</span>';
                }
            ],
            [   'attribute' => 'type',
                'filter'=> ['1' => 'Файл', '0' => 'Изображение',],
                'content'=>function($model){
                    return  $model->type==0 ? '<span class="label label-success">Изображение</span>' : '<span class="label label-primary">Файл</span>';
                }
            ],
            'title_ru',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'],
            ],
    ]); ?>
</div>
