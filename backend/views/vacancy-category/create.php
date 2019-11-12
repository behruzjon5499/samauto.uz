<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VacancyCategory */

$this->title = Yii::t('app', 'Добавить Vacancy Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancy Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-category-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
