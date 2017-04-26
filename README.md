phpNT - Yii2 Datepicker
================================
[![Latest Stable Version](https://poser.pugx.org/phpnt/yii2-datepicker/v/stable)](https://packagist.org/packages/phpnt/yii2-datepicker) [![Total Downloads](https://poser.pugx.org/phpnt/yii2-datepicker/downloads)](https://packagist.org/packages/phpnt/yii2-datepicker) [![Latest Unstable Version](https://poser.pugx.org/phpnt/yii2-datepicker/v/unstable)](https://packagist.org/packages/phpnt/yii2-datepicker) [![License](https://poser.pugx.org/phpnt/yii2-datepicker/license)](https://packagist.org/packages/phpnt/yii2-datepicker)
### Описание:
### Yii2 Datepicker - Гибкий виджет datepicker в стиле Bootstrap.
### [DEMO](http://phpnt.com/widget/datepicker)

------------
### - [Поддержать phpNT](http://phpnt.com/donate/index)
------------

### Социальные сети:
 - [Канал YouTube](https://www.youtube.com/c/phpnt)
 - [Группа VK](https://vk.com/phpnt)
 - [Группа facebook](https://www.facebook.com/Phpnt-595851240515413/)

------------

Установка:

------------

```
php composer.phar require "phpnt/yii2-datepicker" "*"
```
или

```
composer require phpnt/yii2-datepicker
```

или добавить в composer.json файл

```
"phpnt/yii2-datepicker": "*"

```

### Представление:
------------
```php
<?php
use phpnt\datepicker\BootstrapDatepicker;
?>
```
```php
// минимальная настройка
echo $form->field($model, 'date')->widget(BootstrapDatepicker::className());
echo BootstrapDatepicker::widget(['name'  => 'date']);
// полная настройка 
echo $form->field($model, 'date')->widget(BootstrapDatepicker::className(),
            [
                'type'                  => BootstrapDatepicker::TYPE_RANGE,     // тип виджета TYPE_TEXT, TYPE_COMPONENT, TYPE_EMBEDDED, TYPE_RANGE (по умолчанию TYPE_TEXT)
                'attribute_2'           => 'date2', // только для типа TYPE_RANGE
                'autoclose'             => false,   // закрывать при выборе
                'assumeNearbyYear'      => false,   // изменять двухзначный год на четырехзначный (например "17" изменит на "2017")
                'calendarWeeks'         => false,   // отображать календарную неделю
                'clearBtn'              => false,   // отображать кнопку очистить
                'container'             => 'body',  // контейнер для всплывающего окна
                'datesDisabled'         => [],      // отключить даты (например ['12.04.2017', '30.04.2017'])
                'daysOfWeekDisabled'    => [],      // отключить дни недели от 0 до 6 (например ['0', '6'])
                'daysOfWeekHighlighted' => [],      // выделить дни недели от 0 до 6 (например ['0', '6'])
                'defaultViewDate'       => [],      // дата по умолчанию (например ['day' => '25', 'month' => '04', 'year' => '2017'])
                'disableTouchKeyboard'  => false,   // Если правда, на мобильных устройствах не будет отображаться клавиатура
                'enableOnReadonly'      => true,
                'endDate'               => false,   // последняя дата, которую можно выбрать; Все последующие даты будут отключены (например '17.04.2017')
                'forceParse'            => true,    // когда недопустимая дата остается в поле ввода, виджет принудительно проанализирует ее значение
                                                    // и установит значение ввода на новую, действительную дату, соответствующую данному формату.         
                'format' => 'dd.mm.yyyy',           // формат даты
                'immediateUpdates'      => false,   // Если true, выбор года или месяца в datepicker будет немедленно обновлять значение ввода
                                                    // В противном случае, только выбор дня месяца будет немедленно обновлять значение ввода
                'keepEmptyValues'       => false,   // работает только в range. Если true, выбранное значение не распространяется на другие
                'keyboardNavigation'    => true,    // перемещать дату клавиатурой
                'language'              => 'ru',    // выбор языка
                'maxViewMode'           => 4,
                'minViewMode'           => 0,
                'multidate'             => false,   // выбор нескольких дат (например для двух дат, будет значение 2)
                'multidateSeparator'    => ',',     // разделитель нескольких дат
                'orientation'           => 'auto',  // расположение “left”, “right”, “top”, “bottom”, “auto”
                'showOnFocus'           => true,    // открывает при нажатии на input
                'startDate'             => false,   // самая ранняя дата, которую можно выбрать. Все более ранние даты будут отключены
                'startView'             => 0,
                'templates'             => [
                    'leftArrow' => '<i class="fa fa-long-arrow-left"></i>',
                    'rightArrow' => '<i class="fa fa-long-arrow-right"></i>'
                ],
                'showWeekDays'          => true,    // показывать дни недели
                'title'                 => '',      // заголовок
                'todayBtn'              => false,   // отображать кнопку сегодня
                'todayHighlight'        => false,   // выделять сегодня
                'toggleActive'          => false,
                'updateViewDate'        => true,
                'weekStart'             => 0,       // начало недели (значения от 0 до 6)
                'zIndexOffset'          => 10,
            ]);
```
------------
# Документация (примеры):
## [Datepicker for Bootstrap](https://bootstrap-datepicker.readthedocs.io/en/latest)
## [Datepicker for Bootstrap - Sandbox](https://uxsolutions.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&maxViewMode=4&todayBtn=false&clearBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox)
------------
### Лицензия:
### [MIT](https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_MIT)
------------
