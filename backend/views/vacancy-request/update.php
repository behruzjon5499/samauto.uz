<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Обновить заявку: ' . ' ' . $model->secondname . ' ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Просмотр: ' . $model->secondname . ' ' . $model->firstname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => 'Обновить: ' . $model->secondname . ' ' . $model->firstname,];

?>
<div class="vacancy-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
