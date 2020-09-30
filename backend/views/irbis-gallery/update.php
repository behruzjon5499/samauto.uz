<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IrbisGallery */

$this->title = Yii::t('app', 'Обновить {modelClass}: ', [
    'modelClass' => 'Irbis Gallery',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Irbis Galleries'), 'url' => ['index']];

?>
<div class="irbis-gallery-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
