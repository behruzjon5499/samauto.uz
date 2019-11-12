<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Обновить новость: ' . $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];

?>
<div class="news-update">

    <?= $this->render('_form', [
        'model' => $model,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
