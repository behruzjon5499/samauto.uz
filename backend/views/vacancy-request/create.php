<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Добавить Заявку';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
