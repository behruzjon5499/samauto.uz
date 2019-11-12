<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HistoryGallery */

$this->title = Yii::t('app', 'Create History Gallery');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Galleries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
