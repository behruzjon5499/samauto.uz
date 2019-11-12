<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Resume */

$this->title = 'Добавить Resume';
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
