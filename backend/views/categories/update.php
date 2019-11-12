<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = 'Обновить категорию: ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
?>
<div class="categories-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
