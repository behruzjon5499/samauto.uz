<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Transport */

$this->title = Yii::t('app', 'Добавить Transport');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-create">

    
    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,

    ]) ?>

</div>
