<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\IrbisGallery */

$this->title = Yii::t('app', 'Добавить Irbis Gallery');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Irbis Galleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="irbis-gallery-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
