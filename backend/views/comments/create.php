<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
?>
<div class="comments-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
