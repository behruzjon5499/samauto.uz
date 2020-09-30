<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = 'Добавить Информацию';
$this->params['breadcrumbs'][] = ['label' => 'Информаций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
