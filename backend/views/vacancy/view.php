<?php

use backend\helpers\Statushelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Вакансий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'preview_img',
                'value' => $model->preview_img ? '<img src="/uploads/career/vacancy/'. $model->preview_img .'" width="200px">' : '<img src="/uploads/career/vacancy/employee.jpg" width="200px">',
                'format' => 'html'
            ],
            [
                'attribute' => 'status',
                'value' => Statushelper::status($model),
                'format' => 'html'
            ],

            [
                'attribute' => 'category_id',
                'value' => $model->category->title_ru
            ],
            'date:date',
            'title_ru',
            'title_uz',
            'title_en',
            'text_ru:html',
            'text_uz:html',
            'text_en:html',
        ],
    ]) ?>

</div>