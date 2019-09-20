<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

if (class_exists('backend\assets\AppAsset')){
    \backend\assets\AppAsset::register($this);
}else{
    \backend\assets\AppAsset::register($this);
}

\dmstr\web\AdminLteAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" type="image/ico" href="<?= Yii::getAlias('@web') ?>/img/g-icon.ico">
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?php echo $this->render('header.php', ['directoryAsset' => $directoryAsset]); ?>

    <?php echo $this->render('left.php', ['directoryAsset' => $directoryAsset]); ?>

    <?php echo $this->render('content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]); ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>