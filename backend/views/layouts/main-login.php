<?php

use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/ico" href="<?= Yii::getAlias('@web')?>/img/favicon.ico">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head()?>
        <style>
            .fondo{
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body class="login-page fondo" >

        <?php $this->beginBody()?>

        <?= $content ?>

        <?php $this->endBody()?>

    
        <script type="text/javascript">
            $(function () {
                $('.fondo').css({'background-image': 'url(../img/fondo.jpg)'});
            })
        </script>
    </body>
</html>
<?php $this->endPage() ?>