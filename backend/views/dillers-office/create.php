<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DillersOffice */

$this->title = Yii::t('app', 'Добавить Офис дилера');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Офисы дилеров'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dillers-office-create">

    
    <?= $this->render('_form', [
        'model' => $model,
        'diller_id' => $diller_id,
    ]) ?>

</div>
