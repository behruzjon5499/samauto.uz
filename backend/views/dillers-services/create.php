<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DillersServices */

$this->title = Yii::t('app', 'Добавить Сервис');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Сервисы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dillers-services-create">

    
    <?= $this->render('_form', [
        'model' => $model,
        'diller_id' => $diller_id,

    ]) ?>

</div>
