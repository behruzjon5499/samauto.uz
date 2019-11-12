<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = 'Обновить товар: ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
?>
<div class="products-update">


    <?= $this->render('_form', [
        'model' => $model,
        //'model_info' => $model_info,
        //'colors' => $colors,
        //'qualities' => $qualities,
    ]) ?>

</div>
