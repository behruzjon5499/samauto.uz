<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Missions */

$this->title = Yii::t('app', 'Обновить миссиию: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Миссии'), 'url' => ['index']];

?>
<div class="missions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data' => $data,
    ]) ?>

</div>
