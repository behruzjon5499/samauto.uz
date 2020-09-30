<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Обновить заголовок: ' . ' ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Основная страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Просмотр: ' . $model->title_ru, 'url' => ['view-main', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Обновить: ' . $model->title_ru,];

?>
<div class="vacancy-update">

    
    <?= $this->render('_form-main', [
        'model' => $model,
    ]) ?>

</div>
