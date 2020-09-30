<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancySend */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Vacancy Send',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancy Sends'), 'url' => ['index']];

?>
<div class="vacancy-send-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
