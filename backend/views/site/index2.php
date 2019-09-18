<?php
/* @var $this yii\web\View */

//$this->title = 'Dashboard ';
//$this->params['breadcrumbs'][] = "Detalle de actividades";

//$cuentas = [
//    'asignadas' => 0,
//    'verificadas' => 0,
//    'pendientes' => 0,
//    'cerradas' => 0,
//];

use miloschuman\highcharts\Highcharts;
//use miloschuman\highcharts\Highmaps;
//use miloschuman\highcharts\Highstock;
use yii\web\JsExpression;

//echo Highcharts::widget([
//    'scripts' => [
//        'modules/exporting',
//        'themes/grid-light',
//    ],
//    'options' => [
//        'title' => [
//            'text' => 'Combination chart',
//        ],
//        'xAxis' => [
//            'categories' => ['Bueno', 'Malo', 'Regular'],
//        ],
//        'labels' => [
//            'items' => [
//                [
//                    'html' => 'Total fruit consumption',
//                    'style' => [
//                        'left' => '50px',
//                        'top' => '18px',
//                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
//                    ],
//                ],
//            ],
//        ],
//        'series' => [
//            [
//                'type' => 'column',
//                'name' => 'Jane',
//                'data' => [3, 2, 1, 3, 4],
//            ],
//            [
//                'type' => 'column',
//                'name' => 'John',
//                'data' => [2, 3, 5, 7, 6],
//            ],
//            [
//                'type' => 'column',
//                'name' => 'Joe',
//                'data' => [4, 3, 3, 9, 0],
//            ],
//            [
//                'type' => 'spline',
//                'name' => 'Average',
//                'data' => [3, 2.67, 3, 6.33, 3.33],
//                'marker' => [
//                    'lineWidth' => 2,
//                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
//                    'fillColor' => 'white',
//                ],
//            ],
//            [
//                'type' => 'pie',
//                'name' => 'Total consumption',
//                'data' => [
//                    [
//                        'name' => 'Jane',
//                        'y' => 13,
//                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
//                    ],
//                    [
//                        'name' => 'John',
//                        'y' => 23,
//                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
//                    ],
//                    [
//                        'name' => 'Joe',
//                        'y' => 19,
//                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
//                    ],
//                ],
//                'center' => [100, 80],
//                'size' => 100,
//                'showInLegend' => false,
//                'dataLabels' => [
//                    'enabled' => false,
//                ],
//            ],
//        ],
//    ]
//]);
//$this->registerJsFile('http://code.highcharts.com/mapdata/countries/de/de-all.js', [
//    'depends' => 'miloschuman\highcharts\HighchartsAsset'
//]);
//echo Highmaps::widget([
//    'options' => [
//        'title' => [
//            'text' => 'Highmaps basic demo',
//        ],
//        'mapNavigation' => [
//            'enabled' => true,
//            'buttonOptions' => [
//                'verticalAlign' => 'bottom',
//            ]
//        ],
//        'colorAxis' => [
//            'min' => 0,
//        ],
//        'series' => [
//            [
//                'data' => [
//                    ['hc-key' => 'de-ni', 'value' => 0],
//                    ['hc-key' => 'de-hb', 'value' => 1],
//                    ['hc-key' => 'de-sh', 'value' => 2],
//                    ['hc-key' => 'de-be', 'value' => 3],
//                    ['hc-key' => 'de-mv', 'value' => 4],
//                    ['hc-key' => 'de-hh', 'value' => 5],
//                    ['hc-key' => 'de-rp', 'value' => 6],
//                    ['hc-key' => 'de-sl', 'value' => 7],
//                    ['hc-key' => 'de-by', 'value' => 8],
//                    ['hc-key' => 'de-th', 'value' => 9],
//                    ['hc-key' => 'de-st', 'value' => 10],
//                    ['hc-key' => 'de-sn', 'value' => 11],
//                    ['hc-key' => 'de-br', 'value' => 12],
//                    ['hc-key' => 'de-nw', 'value' => 13],
//                    ['hc-key' => 'de-bw', 'value' => 14],
//                    ['hc-key' => 'de-he', 'value' => 15],
//                ],
//                'mapData' => new JsExpression('Highcharts.maps["countries/de/de-all"]'),
//                'joinBy' => 'hc-key',
//                'name' => 'Random data',
//                'states' => [
//                    'hover' => [
//                        'color' => '#BADA55',
//                    ]
//                ],
//                'dataLabels' => [
//                    'enabled' => true,
//                    'format' => '{point.name}',
//                ]
//            ]
//        ]
//    ]
//]);
//$this->registerJs('$.getJSON("//www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?", myCallbackFunction);');
//
//echo Highstock::widget([
//    // The highcharts initialization statement will be wrapped in a function
//    // named 'mycallbackFunction' with one parameter: data.
//    'callback' => 'myCallbackFunction',
//    'options' => [
//        'rangeSelector' => [
//            'inputEnabled' => new JsExpression('$("#container").width() > 480'),
//            'selected' => 1
//        ],
//        'title' => [
//            'text' => 'AAPL Stock Price'
//        ],
//        'series' => [
//            [
//                'name' => 'AAPL Stock Price',
//                'data' => new JsExpression('data'), // Here we use the callback parameter, data
//                'type' => 'areaspline',
//                'threshold' => null,
//                'tooltip' => [
//                    'valueDecimals' => 2
//                ],
//                'fillColor' => [
//                    'linearGradient' => [
//                        'x1' => 0,
//                        'y1' => 0,
//                        'x2' => 0,
//                        'y2' => 1
//                    ],
//                    'stops' => [
//                        [0, new JsExpression('Highcharts.getOptions().colors[0]')],
//                        [1, new JsExpression('Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get("rgba")')]
//                    ]
//                ]
//            ]
//        ]
//    ]
//]);
//use miloschuman\highcharts\Highstock;
//use miloschuman\highcharts\SeriesDataHelper;
//
//// back to the original data from the first example
//$data = [
//    ['date' => '2006-05-14T20:00:00-0400', 'open' => 67.37, 'high' => 68.38, 'low' => 67.12, 'close' => 67.79, 'volume' => 18921051],
//    ['date' => '2006-05-15T20:00:00-0400', 'open' => 68.1, 'high' => 68.25, 'low' => 64.75, 'close' => 64.98, 'volume' => 33470860],
//    ['date' => '2006-05-16T20:00:00-0400', 'open' => 64.7, 'high' => 65.7, 'low' => 64.07, 'close' => 65.26, 'volume' => 26941146],
//    ['date' => '2006-05-17T20:00:00-0400', 'open' => 65.68, 'high' => 66.26, 'low' => 63.12, 'close' => 63.18, 'volume' => 23524811],
//    ['date' => '2006-06-18T20:00:00-0400', 'open' => 63.26, 'high' => 64.88, 'low' => 62.82, 'close' => 64.51, 'volume' => 35221586],
//    ['date' => '2006-06-21T20:00:00-0400', 'open' => 63.87, 'high' => 63.99, 'low' => 62.77, 'close' => 63.38, 'volume' => 25680800],
//    ['date' => '2006-06-22T20:00:00-0400', 'open' => 64.86, 'high' => 65.19, 'low' => 63, 'close' => 63.15, 'volume' => 24814061],
//    ['date' => '2006-06-23T20:00:00-0400', 'open' => 62.99, 'high' => 63.65, 'low' => 61.56, 'close' => 63.34, 'volume' => 32722949],
//    ['date' => '2006-07-24T20:00:00-0400', 'open' => 64.26, 'high' => 64.45, 'low' => 63.29, 'close' => 64.33, 'volume' => 16563319],
//    ['date' => '2006-07-25T20:00:00-0400', 'open' => 64.31, 'high' => 64.56, 'low' => 63.14, 'close' => 63.55, 'volume' => 15464811],
//    ['date' => '2006-07-17T20:00:00-0400', 'open' => 65.68, 'high' => 66.26, 'low' => 63.12, 'close' => 63.18, 'volume' => 23524811],
//    ['date' => '2006-07-18T20:00:00-0400', 'open' => 63.26, 'high' => 64.88, 'low' => 62.82, 'close' => 64.51, 'volume' => 35221586],
//    ['date' => '2006-08-21T20:00:00-0400', 'open' => 63.87, 'high' => 63.99, 'low' => 62.77, 'close' => 63.38, 'volume' => 25680800],
//    ['date' => '2006-09-22T20:00:00-0400', 'open' => 64.86, 'high' => 65.19, 'low' => 63, 'close' => 63.15, 'volume' => 24814061],
//    ['date' => '2006-09-23T20:00:00-0400', 'open' => 62.99, 'high' => 63.65, 'low' => 61.56, 'close' => 63.34, 'volume' => 32722949],
//    ['date' => '2006-09-24T20:00:00-0400', 'open' => 64.26, 'high' => 64.45, 'low' => 63.29, 'close' => 64.33, 'volume' => 16563319],
//    ['date' => '2006-10-25T20:00:00-0400', 'open' => 64.31, 'high' => 64.56, 'low' => 63.14, 'close' => 63.55, 'volume' => 15464811],
//];
//
//function myUnnecessaryFloorCallback($val)
//{
//    if (true) {
//        return floor($val);
//    } else {
//        die('I am Bender. Please insert girder.');
//    }
//}
//
//echo Highstock::widget([
//    'options' => [
//        'title' => ['text' => 'Oy vey! This chart again?!'],
//        'yAxis' => [
//            ['title' => ['text' => 'OHLC'], 'height' => '60%'],
//            ['title' => ['text' => 'Volume'], 'top' => '65%', 'height' => '35%', 'offset' => 0],
//        ],
//         'series' => [
//            [
//                'type' => 'candlestick',
//                'name' => 'OHLC',
//                'data' => new SeriesDataHelper($data, [
//                    'date:datetime', // nothing new here
//                    // the following 4 columns' formatters are functionally equivalent
//                    'open:floor', // PHP built-in function floor()
//                    ['high', 'floor'], // ditto
//                    ['low', function($val) { return floor($val); }], // wrapped in a closure
//                    'close:myUnnecessaryFloorCallback', // fantastic
//                ]),
//            ],
//            [
//                'type' => 'column',
//                'name' => 'Volume',
//                'data' => new SeriesDataHelper($data, [
//                    ['date', 'datetime'], // still nothing new here
//                    ['volume', 'myUnnecessaryFloorCallback'], // mmmmm
//                ]),
//                'yAxis' => 1,
//            ],
//        ]
//    ]
//]);
//use miloschuman\highcharts\Highstock;
//use miloschuman\highcharts\SeriesDataHelper;
//
//// this is the same data as above but without string keys and using a Unix timestamp for the date
//$data = [
//    [1147651200,67.37,68.38,67.12,67.79,18921051],
//    [1147737600,68.10,68.25,64.75,64.98,33470860],
////    [1147824000,64.70,65.70,64.07,65.26,26941146],
////    [1147910400,65.68,66.26,63.12,63.18,23524811],
////    [1147996800,63.26,64.88,62.82,64.51,35221586],
////    [1148256000,63.87,63.99,62.77,63.38,25680800],
////    [1148342400,64.86,65.19,63.00,63.15,24814061],
////    [1148428800,62.99,63.65,61.56,63.34,32722949],
////    [1148515200,64.26,64.45,63.29,64.33,16563319],
////    [1148601600,64.31,64.56,63.14,63.55,15464811],
//];
//
//echo Highstock::widget([
//    'options' => [
//        'title' => ['text' => 'Numerically Indexed'],
//        'yAxis' => [
//            ['title' => ['text' => 'OHLC'], 'height' => '60%'],
//            ['title' => ['text' => 'Volume'], 'top' => '65%', 'height' => '35%', 'offset' => 0],
//        ],
//        'series' => [
//            [
//                'type' => 'candlestick',
//                'name' => 'OHLC',
//                // just like before, only now the columns are referenced by array offset
//                'data' => new SeriesDataHelper($data, ['0:timestamp', 1, 2, 3, 4]),
//            ],
//            [
//                'type' => 'column',
//                'name' => 'Volume',
//                'data' => new SeriesDataHelper($data, ['0:timestamp', '5:int']),
//                'yAxis' => 1,
//            ],
//        ]
//    ]
//]);
?>
<div class="site-index container-fluid">
    <div class="row" align='center' style="background-color: white">
        <div class="col-lg-12">
            <?php

            //            $date = new DateTime(NULL, new DateTimeZone('UTC'));
            //            $date->setDate(1970, 9, 29);
            //            $ts = $date->getTimestamp();
            //            $date->setDate(1970, 10, 9);
            //            $ts2 = $date->getTimestamp();
            //            $date->setDate(1970, 11, 1);
            //            $ts3 = $date->getTimestamp();
            //            $date->setDate(1970, 10, 25);
            //            $ts4 = $date->getTimestamp();
            //            $date->setDate(1970, 11, 6);
            //            $ts5 = $date->getTimestamp();
            //            $date->setDate(1970, 11, 26);
            //            $ts6 = $date->getTimestamp();
            //
            //            echo Highcharts::widget([
            //                'scripts' => [
            //                    'modules/exporting',
            //                    'themes/grid-light',
            //                ],
            //                'options' => [
            //                    'chart' => [
            //                         'type' => 'bar'
            //                    ],
            //                    'title' => [
            //                        'text' => 'Resumen de Tarjeta de Comentarios'
            //                    ],
            //                    'subtitle' => [
            //                        'text' => 'Analisis global de encuestas'
            //                    ],
            //                    'xAxis' => [
            //                        'type' => 'datetime',
            //                        'dateTimeLabelFormats' => [// don't display the dummy year
            //                            'month' => '%e. %b',
            //                            'year' => '%b'
            //                        ],
            //                        'title' => [
            //                            'text' => 'Salida'
            //                        ]
            //                    ],
            //                    'yAxis' => [
            //                        'title' => [
            //                            'text' => 'Cantidad resp (u)'
            //                        ],
            //                        'min' => 0
            //                    ],
            //                    'tooltip' => [
            ////                        'headerFormat' => '<b>{series.name}</b><br>',
            ////                        'pointFormat' => '{point.x:%e. %b}: {point.y:.2f} m'
            //                    ],
            //                    'plotOptions' => [
            //                        'spline' => [
            //                            'marker' => [
            //                                'enabled' => true
            //                            ]
            //                        ]
            //                    ],
            //                    'series' => [
            //                        [
            //                            'name' => 'Salida 1-2017',
            //                            'data' => [
            //                                [$ts, 0],
            //                                [$ts2, 1.2],
            //                                [$ts3, 2.8],
            //                            ]
            //                        ],
            //                        [
            //                            'name' => 'Salida 2-2017',
            //                            'data' => [
            //                                [$ts4, 0],
            //                                [$ts5, 2.1],
            //                                [$ts6, 3.7],
            //                            ]
            //                        ],
            ////                {
            ////        name=> 'Winter 2013-2014',
            ////        data=> [
            ////            [Date.UTC(1970, 9, 29), 0],
            ////            [Date.UTC(1970, 10, 9), 0.4],
            ////            [Date.UTC(1970, 11, 1), 0.25],
            ////            [Date.UTC(1971, 0, 1), 1.66],
            ////            [Date.UTC(1971, 0, 10), 1.8],
            ////            [Date.UTC(1971, 1, 19), 1.76],
            ////            [Date.UTC(1971, 2, 25), 2.62],
            ////            [Date.UTC(1971, 3, 19), 2.41],
            ////            [Date.UTC(1971, 3, 30), 2.05],
            ////            [Date.UTC(1971, 4, 14), 1.7],
            ////            [Date.UTC(1971, 4, 24), 1.1],
            ////            [Date.UTC(1971, 5, 10), 0]
            ////        ]
            ////    }, {
            ////        name=> 'Winter 2014-2015',
            ////        data=> [
            ////            [Date.UTC(1970, 10, 25), 0],
            ////            [Date.UTC(1970, 11, 6), 0.25],
            ////            [Date.UTC(1970, 11, 20), 1.41],
            ////            [Date.UTC(1970, 11, 25), 1.64],
            ////            [Date.UTC(1971, 0, 4), 1.6],
            ////            [Date.UTC(1971, 0, 17), 2.55],
            ////            [Date.UTC(1971, 0, 24), 2.62],
            ////            [Date.UTC(1971, 1, 4), 2.5],
            ////            [Date.UTC(1971, 1, 14), 2.42],
            ////            [Date.UTC(1971, 2, 6), 2.74],
            ////            [Date.UTC(1971, 2, 14), 2.62],
            ////            [Date.UTC(1971, 2, 24), 2.6],
            ////            [Date.UTC(1971, 3, 2), 2.81],
            ////            [Date.UTC(1971, 3, 12), 2.63],
            ////            [Date.UTC(1971, 3, 28), 2.77],
            ////            [Date.UTC(1971, 4, 5), 2.68],
            ////            [Date.UTC(1971, 4, 10), 2.56],
            ////            [Date.UTC(1971, 4, 15), 2.39],
            ////            [Date.UTC(1971, 4, 20), 2.3],
            ////            [Date.UTC(1971, 5, 5), 2],
            ////            [Date.UTC(1971, 5, 10), 1.85],
            ////            [Date.UTC(1971, 5, 15), 1.49],
            ////            [Date.UTC(1971, 5, 23), 1.08]
            ////        ]
            //                    ]
            //                ],
            //            ]);
            //
            ////            echo Highcharts::widget([
            ////                'scripts' => [
            ////                    'modules/exporting',
            ////                    'themes/grid-light',
            ////                ],
            ////                'options' => [
            ////                    'title' => [
            ////                        'text' => 'Encuestas Realizadas'
            ////                    ],
            ////                    'xAxis' => [
            ////                        'categories' => ['Completo', 'Pendiente'],
            ////                    ],
            ////                    'labels' => [
            ////                        'items' => [
            ////                            [
            ////                                'html' => 'Total Salidas',
            ////                                'style' => [
            ////                                    'left' => '50px',
            ////                                    'top' => '18px',
            ////                                    'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
            ////                                ],
            ////                            ],
            ////                        ],
            ////                    ],
            ////                    'series' => [
            ////                        [
            ////                            'type' => 'column',
            ////                            'name' => '1',
            ////                            'data' => [3, 2],
            ////                        ],
            ////                        [
            ////                            'type' => 'column',
            ////                            'name' => '2',
            ////                            'data' => [8, 20],
            ////                        ],
            ////                    ],
            ////                ],
            ////            ]);
            ?>
        </div>
    </div>
    <div class="row" align='center'>
        <div class="col-lg-6">

        </div>
        <div class="col-lg-6">

        </div>
    </div>
    <!--    <div class="row">
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-vcard"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cuentas Asignadas</span>
                        <span class="info-box-number"><?//= $cuentas['asignadas'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cuentas Verificadas</span>
                        <span class="info-box-number"><?//= $cuentas['verificadas'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-question"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cuentas Pendientes</span>
                        <span class="info-box-number"><?//= $cuentas['pendientes'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cuentas Desactivadas</span>
                        <span class="info-box-number"><?//= $cuentas['cerradas'] ?></span>
                    </div>
                </div>
            </div>
        </div>-->

</div>
<p>
    aqui vaaaaaaaaaaaaaaaaaaaaaaaaaaaaaamooooooooosssssssssssss<br>
    <?= $id?>
</p>