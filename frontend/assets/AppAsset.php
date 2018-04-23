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
        'css/fonts.css',

        'css/jquery.bxslider.css',
        'css/font-awesome.min.css',
        'css/swiper.min.css',
        'css/jquery.animateSlider.css',
        'css/radio-checkbox.css',
        //'css/slick-theme.css',
        //'css/slick.css',
        'css/site.css',
        'css/main.css',
    ];
    public $js = [
        //'js/slick.min.js',
        'js/jquery-3.2.1.min.js',
        'js/swiper.min.js',
        'js/jquery.bxslider.min.js',
        'js/bootstrap-filestyle.min.js',
        'js/modernizr.js',
        'js/jquery.animateSlider.js',
        'js/main.js',

    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
