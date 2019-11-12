<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [


    ];
    public $js = [

        'https://maps.googleapis.com/maps/api/js?key=AIzaSyC8Gbjrr2LaEpF1V1KPvSNn61xZjKWTbo8&callback=initMap',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
