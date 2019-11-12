<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Resume */

$this->title = 'Обновить резюме: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['index']];

?>
<div class="resume-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
