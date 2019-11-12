<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsGallery */

$this->title = Yii::t('app', 'Обновить галерею');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Галерея'), 'url' => ['index']];

?>
<div class="news-gallery-update">

    
    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
