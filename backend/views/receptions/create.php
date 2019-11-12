<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Receptions */

$this->title = 'Добавить Receptions';
$this->params['breadcrumbs'][] = ['label' => 'Receptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receptions-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
