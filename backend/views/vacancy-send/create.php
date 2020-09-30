<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VacancySend */

$this->title = Yii::t('app', 'Добавить Vacancy Send');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vacancy Sends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-send-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
