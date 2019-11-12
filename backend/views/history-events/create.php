<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\History */

$this->title = Yii::t('app', 'Добавить событие в историю');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'События в истории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-create">

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,

    ]) ?>

</div>
