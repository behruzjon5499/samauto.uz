<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Documents */

$this->title = 'Обновить документ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];

?>
<div class="documents-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
