<?php
/**
 * Created by PhpStorm.
 * User: phpNT - http://phpnt.com
 * Date: 24.04.2017
 * Time: 22:03
 */

namespace phpnt\datepicker;

use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\bootstrap\Html;

class BootstrapDatepicker extends InputWidget
{
    const TYPE_TEXT = 1;
    const TYPE_COMPONENT = 2;
    const TYPE_EMBEDDED = 3;
    const TYPE_RANGE = 4;

    public $type;
    public $attribute_2;
    public $name_2;
    public $widgetContainerId;
    public $widgetClassId           = '.date-picker';

    public $options = [
        'class' => 'form-control'
    ];

    public $autoclose               = 0;
    public $assumeNearbyYear        = 0;
    public $beforeShowDay           = '$.noop';
    public $beforeShowMonth         = '$.noop';
    public $beforeShowYear          = '$.noop';
    public $beforeShowDecade        = '$.noop';
    public $beforeShowCentury       = '$.noop';
    public $calendarWeeks           = 0;
    public $clearBtn                = 0;
    public $container               = 'body';
    public $datesDisabled           = [];
    public $daysOfWeekDisabled      = [];
    public $daysOfWeekHighlighted   = [];
    public $defaultViewDate         = [];
    public $disableTouchKeyboard    = 0;
    public $enableOnReadonly        = 1;
    public $endDate;
    public $forceParse              = 0;
    public $format                  = 'mm/dd/yyyy';
    public $immediateUpdates        = 0;
    public $inputs;
    public $keepEmptyValues         = 0;
    public $keyboardNavigation      = 1;
    public $language                = 'en';
    public $maxViewMode             = 4;
    public $minViewMode             = 0;
    public $multidate               = 0;
    public $multidateSeparator      = ',';
    public $orientation             = 'auto';
    public $showOnFocus             = true;
    public $startDate;
    public $startView               = 0;
    public $templates               = [
        'leftArrow' => '&laquo;',
        'rightArrow' => '&raquo;'
    ];
    public $showWeekDays            = true;
    public $title                   = '';
    public $todayBtn                = 0;
    public $todayHighlight          = 0;
    public $toggleActive            = 0;
    public $updateViewDate          = 1;
    public $weekStart               = 0;
    public $zIndexOffset            = 10;

    public function init()
    {
        parent::init();
        $this->type = $this->type ? $this->type : 1;
        $this->widgetContainerId = 'date-picker-'.$this->options['id'];
        $this->autoclose = $this->autoclose ? 'true' : 'false';
        $this->assumeNearbyYear = $this->assumeNearbyYear ? 'true' : 'false';
        $this->calendarWeeks = $this->calendarWeeks ? 'true' : 'false';
        $this->clearBtn = $this->clearBtn ? 'true' : 'false';
        $this->datesDisabled = Json::encode($this->datesDisabled);
        $this->daysOfWeekDisabled = Json::encode($this->daysOfWeekDisabled);
        $this->daysOfWeekHighlighted = Json::encode($this->daysOfWeekHighlighted);
        $this->templates = Json::encode($this->templates);
        $this->defaultViewDate = $this->defaultViewDate ? Json::encode($this->defaultViewDate) : Json::encode(['day' => date('d'), 'month' => date('m'), 'year' => date('Y')]);
        $this->inputs = $this->inputs ? $this->inputs : 'false';
        $this->disableTouchKeyboard = $this->disableTouchKeyboard ? 'true' : 'false';
        $this->enableOnReadonly = $this->enableOnReadonly ? 'true' : 'false';
        $this->forceParse = $this->forceParse ? 'true' : 'false';
        $this->immediateUpdates = $this->immediateUpdates ? 'true' : 'false';
        $this->keepEmptyValues = $this->keepEmptyValues ? 'true' : 'false';
        $this->keyboardNavigation = $this->keyboardNavigation ? 'true' : 'false';
        $this->multidate = $this->multidate ? 'true' : 'false';
        $this->showOnFocus = $this->showOnFocus ? 'true' : 'false';
        $this->showWeekDays = $this->showWeekDays ? 'true' : 'false';
        $this->todayBtn = $this->todayBtn ? 'true' : 'false';
        $this->todayHighlight = $this->todayHighlight ? 'true' : 'false';
        $this->toggleActive = $this->toggleActive ? 'true' : 'false';
    }

    public function run()
    {
        $this->registerScript();

        switch ($this->type) {
            case 1:
                if ($this->hasModel()) {
                    echo "<div id='$this->widgetContainerId'>";
                    echo Html::activeInput('text', $this->model, $this->attribute, $this->options);
                    echo '</div>';
                } else {
                    echo "<div id='$this->widgetContainerId'>";
                    echo Html::input('text', $this->name, $this->value, $this->options);
                    echo '</div>';
                }
                break;
            case 2:
                if ($this->hasModel()) {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div class='input-group date'>";
                    echo Html::activeInput('text', $this->model, $this->attribute, $this->options);
                    echo "<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div class='input-group date'>";
                    echo Html::input('text', $this->name, $this->value, $this->options);
                    echo "<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>";
                    echo "</div>";
                    echo "</div>";
                }
                break;
            case 3:
                if ($this->hasModel()) {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div>";
                    echo "</div>";
                    echo "</div>";
                }
                break;
            case 4:
                if ($this->hasModel()) {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div class='input-group input-daterange'>";
                    echo Html::activeInput('text', $this->model, $this->attribute, $this->options);
                    echo "<span class='input-group-addon'> - </span>";
                    echo Html::activeInput('text', $this->model, $this->attribute_2, $this->options);
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<div id='$this->widgetContainerId'>";
                    echo "<div class='input-group input-daterange'>";
                    echo Html::input('text', $this->name, $this->value, $this->options);
                    echo "<span class='input-group-addon'> - </span>";
                    echo Html::input('text', $this->name_2, $this->value, $this->options);
                    echo "</div>";
                    echo "</div>";
                }
                break;
        }
    }

    public function registerScript() {
        $view = $this->getView();
        $asset = BootstrapDatepickerAsset::register($view);

        if ($this->language != 'en') {
            $view->registerJsFile($asset->baseUrl.'/js/locales/bootstrap-datepicker.'.$this->language.'.js',
                ['depends' => [\yii\web\JqueryAsset::className()]]);
        }

        $js = <<<JS
        var type = $this->type;
        var options = {
            autoclose: $this->autoclose,
            assumeNearbyYear: $this->assumeNearbyYear,
            beforeShowDay: $this->beforeShowDay,
            beforeShowMonth: $this->beforeShowMonth,
            beforeShowYear: $this->beforeShowYear,
            beforeShowDecade: $this->beforeShowDecade,
            beforeShowCentury: $this->beforeShowCentury,
            calendarWeeks: $this->calendarWeeks,
            clearBtn: $this->clearBtn,
            container: '$this->container',
            datesDisabled: $this->datesDisabled,
            daysOfWeekDisabled: $this->daysOfWeekDisabled,
            daysOfWeekHighlighted: $this->daysOfWeekHighlighted,
            defaultViewDate: $this->defaultViewDate,
            disableTouchKeyboard: $this->disableTouchKeyboard,
            enableOnReadonly: $this->enableOnReadonly,
            endDate: '$this->endDate', 
            forceParse: $this->forceParse,
            format: '$this->format',
            immediateUpdates: $this->immediateUpdates,
            inputs: $this->inputs,
            keepEmptyValues: $this->keepEmptyValues,
            keyboardNavigation: $this->keyboardNavigation,
            language: '$this->language',
            maxViewMode: $this->maxViewMode,
            minViewMode: $this->minViewMode,
            multidate: $this->multidate,
            multidateSeparator: '$this->multidateSeparator',
            orientation: '$this->orientation',
            showOnFocus: $this->showOnFocus,
            startDate: '$this->startDate',
            startView: '$this->startView',
            templates: $this->templates,
            showWeekDays: $this->showWeekDays,
            title: '$this->title',
            todayBtn: $this->todayBtn,
            todayHighlight: $this->todayHighlight,
            toggleActive: $this->toggleActive,
            updateViewDate: $this->updateViewDate,
            weekStart: $this->weekStart,
            zIndexOffset: $this->zIndexOffset,
        };
        
        switch ($this->type) {
            case 1:
                $("#$this->widgetContainerId input").datepicker(options);
                break;
            case 2:
                $("#$this->widgetContainerId .input-group.date").datepicker(options);
                break;
            case 3:
                $("#$this->widgetContainerId div").datepicker(options);
                break;
            case 4:
                $("#$this->widgetContainerId .input-daterange").datepicker(options);
                break;
        }
         
JS;
        $view->registerJs($js);

    }
}