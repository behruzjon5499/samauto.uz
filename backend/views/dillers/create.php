<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Dillers */

$this->title = Yii::t('app', 'Добавить Дилера');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Дилеры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dillers-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
