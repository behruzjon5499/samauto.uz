<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CompanyUsers */

$this->title = 'Добавить сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['directors']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-users-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
