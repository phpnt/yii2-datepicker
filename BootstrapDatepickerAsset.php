<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 19.04.2017
 * Time: 9:07
 */

namespace phpnt\datepicker;


use yii\web\AssetBundle;

class BootstrapDatepickerAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/bootstrap-datepicker';

    /**
     * @inherit
     */
    public $css = [
        'dist/css/bootstrap-datepicker3.standalone.min.css'
    ];

    /**
     * @inherit
     */
    public $js = [
        'dist/js/bootstrap-datepicker.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public function init()
    {
        parent::init();
    }
}
