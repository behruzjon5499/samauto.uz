<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DownloadPrice */

$this->title = 'Добавить Download Price';
$this->params['breadcrumbs'][] = ['label' => 'Download Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="download-price-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
