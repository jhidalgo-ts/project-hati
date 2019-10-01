<?php

use yii\helpers\Html;

$logo = Yii::getAlias('@app/web/img/logo_chaski.jpg');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>

</head>
<body>
<img style="width: 200px;" src="<?= $message->embed($logo); ?>">

<?= $content ?>

</body>
</html>
