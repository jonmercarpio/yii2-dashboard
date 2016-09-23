<?php

namespace jonmer09\dashboard\components\helpers;

use jonmer09\dashboard\models\Graphic;

/**
 * Description of Graphic
 *
 * @author Jonmer Carpio <jonmer09@gmail.com>
 */
class GraphicHelper {

    public static $list = [
        //'AnnotationChart' => 'annotationchart',
        'AreaChart' => 'AreaChart',
        'BarChart' => 'BarChart',
        'BubbleChart' => 'BubbleChart',
        //'Calendar' => 'calendar',
        //'CandlestickChart' => 'corechart',
        'ColumnChart' => 'ColumnChart',
        'ComboChart' => 'ComboChart',
        'GeoChart' => 'GeoChart',
        'Histogram' => 'Histogram',
        'LineChart' => 'LineChart',
        //'Map' => 'map',
        'PieChart' => 'PieChart',
        'ScatterChart' => 'ScatterChart',
        'SteppedAreaChart' => 'SteppedAreaChart',
        'Table' => 'Table',
        //'Timeline' => 'timeline',
        //'TreeMap' => 'treemap',
        'WordTree' => 'WordTree',
    ];
    public static $packages = [
        //'AnnotationChart' => 'annotationchart',
        'AreaChart' => 'corechart',
        'BarChart' => 'corechart',
        'BubbleChart' => 'corechart',
        //'Calendar' => 'calendar',
        //'CandlestickChart' => 'corechart',
        'ColumnChart' => 'corechart',
        'ComboChart' => 'corechart',
        'GeoChart' => 'geochart',
        'Histogram' => 'corechart',
        'LineChart' => 'corechart',
        //'Map' => 'map',
        'PieChart' => 'corechart',
        'ScatterChart' => 'corechart',
        'SteppedAreaChart' => 'corechart',
        'Table' => 'table',
        //'Timeline' => 'timeline',
        //'TreeMap' => 'treemap',
        'WordTree' => 'wordtree',
    ];

    public static function getVisualitationData(Graphic $model) {
        $validate = function($v) {
            return is_numeric($v) ? $v + 0 : $v;
        };
        $_d = \Yii::$app->db->createCommand($model->source)->queryAll();
        $_keys = array_keys($_d[0]);
        $__d[] = $_keys;
        foreach ($_d as $d) {
            $_values = array_values($d);
            $_k = array_shift($_values);
            $_values = array_map($validate, $_values);
            array_unshift($_values, $_k);
            $__d[] = $_values;
        }
        return $__d;
    }

}
