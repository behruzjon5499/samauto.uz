<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Vacancy',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancies'), 'url' => ['index']];

?>
<div class="vacancy-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
