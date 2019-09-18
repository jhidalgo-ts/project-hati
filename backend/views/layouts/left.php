<?php

use backend\assets\AppAsset;
use mdm\admin\components\MenuHelper;

$bundle = AppAsset::register($this);


$imagen = $this->assetManager->getAssetUrl($bundle, 'img/avatar/avatar-adm.png');
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $imagen ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php
        $result = MenuHelper::getAssignedMenu(Yii::$app->user->id);
        $menu = backend\controllers\SiteController::armarMenu($result);
        $items = backend\controllers\SiteController::armarAcciones($menu);
        echo dmstr\widgets\Menu::widget(
                [
                        'encodeLabels' => false,
                        'options' => ['class' => 'sidebar-menu'],
                        'items' => $items,
                ]
        );
        ?>
    </section>
</aside>
