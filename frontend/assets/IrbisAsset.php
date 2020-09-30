<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class IrbisAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'transport/css/jquery.fancybox.css',
        'transport/js/skins/jquery-ui-like/progressbar.css',
    ];
    public $js = [
        '/js/bootstrap.min.js',
        'transport/js/jquery-1.9.1.min.js',
        'transport/js/useragent.js',
        'transport/js/isdevice.js',
        'transport/js/embedpano.js',
        'transport/js/krpano_1_18_2.js',
        'transport/js/preloadCssImages.js',
        'transport/js/liquidslider/jquery.easing.1.3.js',
        'transport/js/liquidslider/jquery.liquid-slider.min.js',
        'transport/js/progressbar.js',
        'transport/js/jquery.panzoom.js',
        'transport/js/jquery.reel.js',
        'transport/js/jquery.fancybox.js',
        'transport/js/config.js',
        'transport/js/config-my-16.js',
        'transport/js/app.js?v=2',
        'transport/js/interior.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
