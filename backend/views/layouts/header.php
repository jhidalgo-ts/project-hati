<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$connection = \Yii::$app->db;
$sql = "select item_name from core.auth_assignment inner join core.user  on cast(core.auth_assignment.user_id as integer) = core.user.id where username='" . Yii::$app->user->identity->username . "'limit 1";
$users = $connection->createCommand($sql);
$perfil = $users->queryOne();
if (Yii::$app->user->identity->perfil) {
    $imagen = (Yii::$app->user->identity->perfil->foto) ? Yii::$app->user->identity->perfil->foto : 'usuario.jpg';
    $pathImagen = Yii::getAlias('@web') . "/img/usuarios/" . $imagen;
} else {
    $pathImagen = Yii::getAlias('@web') . "/img/usuarios/usuario.jpg";
}

?>
<header class="main-header">
    <?= Html::a('<span class="logo-mini">' . Html::img('@web/img/logo.png', ['alt' => 'Logo', 'class' => 'img-responsive']) . '</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <nav class="navbar navbar-default" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!--<div class="container-fluid">-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="color: white; background-color: white"></span>
                <span class="icon-bar" style="color: white; background-color: white"></span>
                <span class="icon-bar" style="color: white; background-color: white"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                foreach (Yii::$app->controller->modulosSistema as $value) {
                    $opcion = (object) $value;
                    $model = mdm\admin\models\Menu::findOne($opcion->id);
                    $result = (backend\components\Controller::verificarModuloMenu($value->id));
                    $items = backend\components\Controller::armarAcciones($result);
                    if ($items) {
                        if ($model->id == Yii::$app->controller->moduloSeleccionado) {
                            echo "<li id='$model->id' class='active modulo'><a href='#'><i class='$model->icon'></i>&nbsp;$model->name</a></li>";
                        } else {
                            echo "<li id='$model->id' class='modulo'><a href='#'><i class='$model->icon'></i>&nbsp;$model->name</a></li>";
                        }
                    }
                }
                ?>
            </ul>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav navbar-right">
                    <!--                        <li class="dropdown messages-menu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-envelope-o"></i>
                                                    <span class="label label-success">4</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="header">You have 4 messages</li>
                                                    <li>
                                                        <ul class="menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="pull-left">
                                                                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                                                             alt="User Image"/>
                                                                    </div>
                                                                    <h4>
                                                                        Support Team
                                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                                    </h4>
                                                                    <p>Why not buy a new awesome theme?</p>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <div class="pull-left">
                                                                        <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                                             alt="user image"/>
                                                                    </div>
                                                                    <h4>
                                                                        AdminLTE Design Team
                                                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                                    </h4>
                                                                    <p>Why not buy a new awesome theme?</p>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="pull-left">
                                                                        <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                                             alt="user image"/>
                                                                    </div>
                                                                    <h4>
                                                                        Developers
                                                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                                                    </h4>
                                                                    <p>Why not buy a new awesome theme?</p>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="pull-left">
                                                                        <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                                             alt="user image"/>
                                                                    </div>
                                                                    <h4>
                                                                        Sales Department
                                                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                                    </h4>
                                                                    <p>Why not buy a new awesome theme?</p>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="pull-left">
                                                                        <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                                             alt="user image"/>
                                                                    </div>
                                                                    <h4>
                                                                        Reviewers
                                                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                                    </h4>
                                                                    <p>Why not buy a new awesome theme?</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="footer"><a href="#">See All Messages</a></li>
                                                </ul>
                                            </li>-->
                    <!--                        <li class="dropdown notifications-menu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bell-o"></i>
                                                    <span class="label label-warning">10</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="header">You have 10 notifications</li>
                                                    <li>
                                                        <ul class="menu">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                                                    not fit into the page and may cause design problems
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="footer"><a href="#">View all</a></li>
                                                </ul>
                                            </li>-->
                    <!--                        <li class="dropdown tasks-menu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-flag-o"></i>
                                                    <span class="label label-danger">9</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="header">You have 9 tasks</li>
                                                    <li>
                                                        <ul class="menu">
                                                            <li>
                                                                <a href="#">
                                                                    <h3>
                                                                        Design some buttons
                                                                        <small class="pull-right">20%</small>
                                                                    </h3>
                                                                    <div class="progress xs">
                                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                            <span class="sr-only">20% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <h3>
                                                                        Create a nice theme
                                                                        <small class="pull-right">40%</small>
                                                                    </h3>
                                                                    <div class="progress xs">
                                                                        <div class="progress-bar progress-bar-green" style="width: 40%"
                                                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                            <span class="sr-only">40% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <h3>
                                                                        Some task I need to do
                                                                        <small class="pull-right">60%</small>
                                                                    </h3>
                                                                    <div class="progress xs">
                                                                        <div class="progress-bar progress-bar-red" style="width: 60%"
                                                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                            <span class="sr-only">60% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <h3>
                                                                        Make beautiful transitions
                                                                        <small class="pull-right">80%</small>
                                                                    </h3>
                                                                    <div class="progress xs">
                                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                                             aria-valuemax="100">
                                                                            <span class="sr-only">80% Complete</span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="footer">
                                                        <a href="#">View all tasks</a>
                                                    </li>
                                                </ul>
                                            </li>-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= $pathImagen ?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= $pathImagen ?>" class="img-circle"
                                     alt="User Image"/>

                                <p>
                                    <?= Yii::$app->user->identity->username ?> - <?= $perfil['item_name'] ?>
                                    <small>Usuario desde <?= date('M Y', Yii::$app->user->identity->created_at) ?> </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!--                                <li class="user-body">
                                                                <div class="col-xs-4 text-center">
                                                                    <a href="#">Followers</a>
                                                                </div>
                                                                <div class="col-xs-4 text-center">
                                                                    <a href="#">Sales</a>
                                                                </div>
                                                                <div class="col-xs-4 text-center">
                                                                    <a href="#">Friends</a>
                                                                </div>
                                                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?=
                                    Html::a(
                                        '<i class="fa fa-user-md"></i>&nbsp;Perfil', ['/site/perfil'], ['class' => 'btn btn-default btn-flat', 'style' => ['width' => '100px']]
                                    )
                                    ?>
                                </div>
                                <div class="pull-right">
                                    <?=
                                    Html::a(
                                        '<i class="fa fa-sign-out"></i>&nbsp;Salir', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat', 'style' => ['width' => '100px']]
                                    )
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!--                        <li>
                                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                            </li>-->
                </ul>
            </div>
        </div>
    </nav>
</header>
<script>
    $(function () {
        $('.modulo').click(function () {
            var id = $(this).attr('id');
            $(location).attr('href', '<?= Yii::getAlias('@web') ?>/site/modulo?id=' + id);
        });
    });
</script>
