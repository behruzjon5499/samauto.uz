<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Faqs */

$this->title = 'Добавить Вопрос/Ответ';
$this->params['breadcrumbs'][] = ['label' => 'Вопросы и ответы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faqs-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
