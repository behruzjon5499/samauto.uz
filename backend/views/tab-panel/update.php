<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TabPanel */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Tab Panel',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tab Panels'), 'url' => ['index']];

?>
<div class="tab-panel-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
