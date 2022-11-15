<?php

namespace backend\assets;

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendor/fontawesome-free/css/all.min.css',
        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
        'css/sb-admin-2.min.css',
        'css/style.css',
        'datepicker/css/bootstrap.min.css',
        'datepicker/libraries/fontawesome/css/all.min.css',
        'datepicker/libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'
    ];
    public $js = [
        "vendor/jquery-easing/jquery.easing.min.js",
        "vendor/chart.js/Chart.min.js",
        "js/sb-admin-2.min.js",
        "datepicker/js/jquery.min.js",
        // "datepicker/js/bootstrap.min.js",
        "datepicker/libraries/moment/moment.min.js",
        "datepicker/libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
        "datepicker/js/custom.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        JqueryAsset::class,
        BootstrapPluginAsset::class
    ];
}
