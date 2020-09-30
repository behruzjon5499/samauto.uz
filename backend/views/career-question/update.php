<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Обновить вопрос: ' . ' ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Просмотр: ' . $model->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Обновить: ' . $model->fullname,];

?>
<div class="vacancy-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
