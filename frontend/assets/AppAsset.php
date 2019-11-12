<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libs/slick/slick.css',
        'libs/slick/slick-theme.css',
        'libs/lightbox/lightbox.css',
        'libs/overlayScrollbars/overlayScrollbars.min.css',
        'libs/aos/aos.css',
        'css/shared.css',
        'css/style.css',
        'css/responsive.css',

    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'libs/slick/slick.min.js',
        'libs/overlayScrollbars/overlayScrollbars.min.js',
        'libs/lightbox/lightbox.js',
        '/js/lodash.min.js',
        'js/jquery.countdown.min.js',
        'libs/aos/aos.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
