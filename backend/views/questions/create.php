<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Questions */

$this->title = 'Добавить Questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
