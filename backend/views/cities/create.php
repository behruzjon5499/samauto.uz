<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cities */

$this->title = 'Добавить город';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
