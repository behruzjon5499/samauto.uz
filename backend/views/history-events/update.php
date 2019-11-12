<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\History */

$this->title = Yii::t('app', 'Обновить историю: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'История'), 'url' => ['index']];

?>
<div class="history-update">

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,

    ]) ?>

</div>
