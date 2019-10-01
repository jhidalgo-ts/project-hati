<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use mdm\admin\components\Helper;

return[
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'coditem',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'descripcion',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'bodega',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'piso',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'observacion',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'cantidad',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'unidad',
    ],
    [
        'class' => '\kartik\grid\EditableColumn',
        'attribute' => 'cantidadfiscaliza',
        'value' => 'cantidadfiscaliza',
        'refreshGrid' => true,
        'editableOptions' => function($model){
            return[
                'header' => 'Cant. Fisca',
                'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                'formOptions' => [
                    'action' => Url::to(['cab-salidas/cant?id=' . $model->id])
                ],
            ];
        },
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'diferencia',
    ],
    [
        'class' => '\kartik\grid\editableColumn',
        'attribute' => 'comentario',
        'value' => 'comentario',
        'refreshGrid' => true,
        'editableOptions' => function($model){
            return[
                'header' => 'Comentario',
                'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                'formOptions' => [
                    'action' => Url::to(['cab-salidas/obs?id=' . $model->id])
                ],
            ];
        },
    ],
];
