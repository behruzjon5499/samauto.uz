<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PickupForm */

$this->title = Yii::t('app', 'Create Pickup Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pickup Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pickup-form-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
