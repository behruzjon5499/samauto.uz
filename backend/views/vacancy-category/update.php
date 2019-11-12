<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VacancyCategory */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Vacancy Category',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancy Categories'), 'url' => ['index']];

?>
<div class="vacancy-category-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
