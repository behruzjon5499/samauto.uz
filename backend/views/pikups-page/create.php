<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PikupsPage */

$this->title = Yii::t('app', 'Добавить Pikups Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pikups Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pikups-page-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
