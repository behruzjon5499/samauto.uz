<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/fsvs/fsvs.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-2.2.4.js',
        'js/jquery.mobile.custom.min.js',
        'libs/fsvs/fsvs.js',
        'js/sprite.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
