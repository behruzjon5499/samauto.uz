<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DownloadPrice */

$this->title = 'Обновить: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Скачивание прайса', 'url' => ['index']];

?>
<div class="download-price-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
