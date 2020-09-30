<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PikupsPage */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Pikups Page',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pikups Pages'), 'url' => ['index']];

?>
<div class="pikups-page-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
