<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DillersOffice */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Офис дилера',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Офисы дилеров'), 'url' => ['index?diller_id='.$diller_id]];

?>
<div class="dillers-office-update">

    
    <?= $this->render('_form', [
        'model' => $model,
        'diller_id' => $diller_id,
    ]) ?>

</div>
