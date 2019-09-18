<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CabSalidas */
?>
<div class="cab-salidas-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'docnum',
            'salidanum',
            'tiposalida',
            'fechadocumento',
            'solicita',
            'aprueba',
            'retira',
            'estado',
        ],
    ]) ?>

</div>
