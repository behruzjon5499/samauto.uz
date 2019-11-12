<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
		'/js/jquery_1.11.3.js',
        /*'js/all-krajee.js',
        'js/bootstrap-datepicker.min.js',
        'datepicker-kv.min.js',
        'js/bootstrap-datepicker.ru.min.js',*/

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
