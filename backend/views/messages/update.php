<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */

$this->title = 'Чтение сообщения: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];

?>
<div class="messages-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
