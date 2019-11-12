<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Actions */

$this->title = 'Обновить Actions: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Actions', 'url' => ['index']];

?>
<div class="actions-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
