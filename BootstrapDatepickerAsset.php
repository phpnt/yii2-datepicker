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

    public function init()
    {
        $this->registerJs();
        parent::init();
    }

    protected function registerJs()
    {
        $js = <<<JS
        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            language: 'ru',
            autoclose: true
        });
JS;
        \Yii::$app->view->registerJs($js);
        return $this;
    }
}