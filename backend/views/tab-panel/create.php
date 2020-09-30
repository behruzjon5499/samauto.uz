<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TabPanel */

$this->title = Yii::t('app', 'Добавить Tab Panel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tab Panels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tab-panel-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
