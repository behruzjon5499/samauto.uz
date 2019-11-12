<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Faqs */

$this->title = 'Обновить Вопрос/Ответ: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы и ответы', 'url' => ['index']];

?>
<div class="faqs-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
