<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Questions */

$this->title = 'Обновить вопрос: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];

?>
<div class="questions-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
