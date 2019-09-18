<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login System';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">

    <div class="login-logo">
        <a href="#"><b>Gestion de Proyecto</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><b>Formulario de Inicio</b></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?=
        $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'Usuario'])
        ?>

        <?=
        $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Clave'])
        ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <a href="<?=  Yii::getAlias('@web')?>/site/forgot">Olvido su clave</a><br>
        <a href="<?=  Yii::getAlias('@web')?>/site/signup">Crear Cuenta</a><br>
    </div>

</div>
