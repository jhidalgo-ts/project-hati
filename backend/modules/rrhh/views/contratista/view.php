<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contratista */
?>
<div class="contratista-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'numid',
            'razonsocial',
            'replegal',
            'formapago',
            'numcuenta',
            'pagquincenal',
            'estado',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
