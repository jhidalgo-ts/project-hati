<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            if ($this->title !== null) {
                echo \yii\helpers\Html::encode($this->title);
            }
            ?>
        </h1>
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer  text-center">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy; 2019 <a href="https://gogalapagos.com" target="_blank">Chaskiroute Ecuador</a>.</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Desarrollado en Chaskiroute Ecuador
</footer>
