<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Regions */

$this->title = 'Область: ' . ' ' . $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Области', 'url' => ['index']];
?>
<div class="regions-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
