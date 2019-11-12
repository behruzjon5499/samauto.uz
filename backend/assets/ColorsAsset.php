<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ColorsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/colorpicker.css',
        //'css/layout.css'
    ];
    public $js = [
		'js/colorpicker.js',
        'js/eye.js',
        'js/utils.js',
        //'js/layout.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
