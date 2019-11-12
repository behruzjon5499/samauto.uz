<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cities */

$this->title = 'Город: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
?>
<div class="cities-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
