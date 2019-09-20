<?php
/* @var $this yii\web\View */

$this->title = 'Dashboard';

?>
<div class="site-index">
    <?php
    if (!empty($mensaje)){
    ?>
    <div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i>
        <?= $mensaje ?>
    </div>
    <?php }?>
    <div class="jumbotron">
        <h1>Sistema de Gestion de Proyectos Chaski Route</h1>
        <p class="lead">Sistema de gestion de Proyectos Hotel Chaskiroute</p>
    </div>
</div>
