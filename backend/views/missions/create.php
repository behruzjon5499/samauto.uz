<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Missions */

$this->title = Yii::t('app', 'Добавить миссию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Миссии'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="missions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
