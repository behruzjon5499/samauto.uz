<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CarsSlider */

$this->title = Yii::t('app', 'Обновить слайдер: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайдеры авто'), 'url' => ['index']];
?>
<div class="cars-slider-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
