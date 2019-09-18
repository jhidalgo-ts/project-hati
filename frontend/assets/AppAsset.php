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
        'css/site.css',
        'css/responsive-320.css',
        'css/responsive-375.css',
        'css/responsive-540.css',
        'css/responsive-768.css',
        'css/responsive-800.css',
        'css/responsive-980.css',
        'css/responsive-1280.css',
        'css/responsive-1920.css',
        'css/animate.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}