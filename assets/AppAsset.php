<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
	//public $sourcePath='@bower/';
    public $baseUrl = '@web';
    //public $css = [
      //  'web/css/site.css',
		//'web/css/login.css',
    //];
    //public $js = [
    //];
	 public $css = [
        'web/css/site.css',
        //'web/css/ionicons.min.css',
		'web/css/login.css',
        'web/css/fonts.css',
        'web/css/select2.css'
    ];
    public $js = [
        'web/js/html5shiv.js',
        'web/js/respond.min.js',
        'web/js/jquery.slimscroll.js',
        'web/js/bootbox.min.js',
        'web/js/select2.min.js',
        'web/js/combodate.js',
        'web/js/moment.min.js',
        'web/js/jquery.inputmask.js',
        'web/js/highcharts.js',
        'web/js/highcharts-3d.js',
        'web/js/exporting.js',
        'web/js/offline-exporting.js'
		];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset',
    ];
}
