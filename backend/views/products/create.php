<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <?= $this->render('_form', [
        'model' => $model,
        //'model_info' => $model_info,
        //'colors' => $colors,
       // 'qualities' => $qualities,
    ]) ?>

</div>
