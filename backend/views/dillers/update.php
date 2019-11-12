<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dillers */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Дилера',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Дилеры'), 'url' => ['index']];

?>
<div class="dillers-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
