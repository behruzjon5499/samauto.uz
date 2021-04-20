<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PickupForm */

$this->title = Yii::t('app', 'Update Pickup Form: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pickup Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pickup-form-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
