<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CarsSlider */

$this->title = Yii::t('app', 'Добавить слайдер');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайдеры авто'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-slider-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
