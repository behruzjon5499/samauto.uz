<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyUsers */

$this->title = 'Сотрудники: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['directors']];

?>
<div class="company-users-update">

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
