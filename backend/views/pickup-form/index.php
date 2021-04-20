<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PickupFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pickup Forms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pickup-form-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create Pickup Form'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'region',
            'diller',
            'first_name',
            'last_name',
            //'middle_name',
            //'email:email',
            //'phone',
            //'check',
            //'check1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
