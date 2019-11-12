<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Doljnost */

$this->title = 'Create Doljnost';
$this->params['breadcrumbs'][] = ['label' => 'Doljnosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doljnost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
