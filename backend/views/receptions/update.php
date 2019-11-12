<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Receptions */

$this->title = 'Обновить Запись на прием: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Записи на прием', 'url' => ['index']];

?>
<div class="receptions-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
