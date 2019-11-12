<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transport */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Transport',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transports'), 'url' => ['index']];

?>
<div class="transport-update">

    
    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,
    ]) ?>

</div>
