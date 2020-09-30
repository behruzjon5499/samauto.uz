<?php

use backend\helpers\Statushelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Основная страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'preview_img',
                'value' => $model->preview_img ? '<img src="/uploads/career/main/'. $model->preview_img .'" width="200px">' : '<img src="/uploads/career/main/no-image.png" width="200px">',
                'format' => 'html'
            ],
            'title_ru',
            'title_uz',
            'title_en',
        ],
    ]) ?>

</div>
