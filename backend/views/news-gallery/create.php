<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsGallery */

$this->title = Yii::t('app', 'Добавить в галерею');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Галерея'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-gallery-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
