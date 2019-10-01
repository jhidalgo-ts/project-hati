<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
    /*[
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],*/
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'docnum',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'salidanum',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'tiposalida',
        //'width' => '80px',
        'value' => function($model){
            if($model->tiposalida){
                return Yii::$app->params['tipoSalida'][$model->tiposalida];
            }
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'fechadocumento',
        'width' => '80px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'solicita',
        'value' => function($model){
            if($model->solicita){
                return Yii::$app->params['personalObra'][$model->solicita];
            }
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'aprueba',
        'value' => function($model){
            if($model->aprueba){
                return Yii::$app->params['personalObra'][$model->aprueba];
            }
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'filter' => false,
        'attribute'=>'retira',
    ],
    [
        'class'=>'\kartik\grid\BooleanColumn',
        'filter' => false,
        'attribute'=>'estado',
    ],
    [
        'class' => '\kartik\grid\ActionColumn',
        'dropdown' => false,
        'width' => '150px',
        'vAlign' => 'middle',
        'template' => '{fiscalizar}',
        'buttons' => [
            'fiscalizar' => function($url, $model){
                return Html::a('<span class="glyphicon glyphicon-link"></span>', $url, [
                    'title' => 'Fiscalizar', 'data-toggle' => 'tooltip', 'role' => 'model-remote', 'data-pjax' => "0", 'class' => 'hand'
                ]);
            },
        ],
    ],

];   