<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DillersServices */

$this->title = 'Обновить Сервис';

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Сервисы'), 'url' => ['index?diller_id='.$diller_id]];

?>
<div class="dillers-services-update">

    
    <?= $this->render('_form', [
        'model' => $model,
        'diller_id' => $diller_id,

    ]) ?>

</div>
