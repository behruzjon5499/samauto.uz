<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Regions */

$this->title = 'Добавить область';
$this->params['breadcrumbs'][] = ['label' => 'Области', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
