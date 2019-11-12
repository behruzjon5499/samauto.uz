<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Companies */

$this->title = 'Обновить руководителя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Руководители', 'url' => ['index']];

?>
<div class="companies-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
