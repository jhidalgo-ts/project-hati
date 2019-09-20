<aside class="main-sidebar">
<?php

use mdm\admin\components\MenuHelper;

if (Yii::$app->user->identity->perfil) {
    $imagen = (Yii::$app->user->identity->perfil->foto) ? Yii::$app->user->identity->perfil->foto : 'usuario.jpg';
    $pathImagen = Yii::getAlias('@web') . "/img/usuarios/" . $imagen;
    $usuario = Yii::$app->user->identity->perfil->nombres;
} else {
    $pathImagen = Yii::getAlias('@web') . "/img/usuarios/usuario.jpg";
    $usuario = Yii::$app->user->identity->username;
}
?>
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $pathImagen ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $usuario ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

    <?php
    $result = (backend\controllers\SiteController::armarMenu());
    $items = backend\controllers\SiteController::armarMenu($result);

    if($items){
        echo \dmstr\widgets\Menu::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $items,

                ]
        );
    }else{
        $icon = ((int) Yii::$app->controller->moduloSeleccionado) ? 'fa-close' : 'fa-info';
        $texto = ((int) Yii::$app->controller->moduloSeleccionado) ? 'No tiene opciones asignadas' : 'Seleccione un Modulo del Sistema';
        $color = ((int) Yii::$app->controller->moduloSeleccionado) ? 'text-danger' : 'text-info';

    ?>
        <p style="background-color: white; margin: 10px; padding: 5px;" class="text-center">
            <i class="fa <?= $icon ?>"></i>
            <span class="<?= $color ?> text-uppercase">&nbsp;
                    <?= $texto ?>
                </span>
        </p>
        <?php
        }
        ?>

    </section>
</aside>
