<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Добавить Историю';
$this->params['breadcrumbs'][] = ['label' => 'Историй', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
