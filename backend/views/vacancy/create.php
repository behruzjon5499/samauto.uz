<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = Yii::t('app', 'Добавить Vacancy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
