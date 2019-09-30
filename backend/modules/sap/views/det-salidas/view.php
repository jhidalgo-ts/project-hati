<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DetSalidas */
?>
<div class="det-salidas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cab_id',
            'coditem',
            'descripcion',
            'bodega',
            'cantidad',
            'unidad',
            'piso',
            'observacion',
            'cantidadfiscaliza',
            'diferencia',
            'comentario',
            'estado',
        ],
    ]) ?>

</div>
