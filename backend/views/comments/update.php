<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = 'Обновить комментарий: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
?>
<div class="comments-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
