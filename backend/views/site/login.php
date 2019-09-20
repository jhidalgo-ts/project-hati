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
<style>
    .login-box, .register-box{
        margin: 3% auto;
    }
    hr {border: 0; height: 0; border-top: 4px double black; text-align:center;}
    hr:after {position: relative; top: -21px; content:"\25cf\25cf\25cf"; font-size: 28px;line-height: 34px; color: black;}
</style>

<div class="col-lg-12">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
<div class="col-lg-12">
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
</div>

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

        <hr>
        <div class="row">
            <div class="col-lg-6">
                <a href="request-password-reset">Olvido su Clave</a>
            </div>
            <div class="col-lg-6 text-right">
                <a href="signup">Registrarse</a>
            </div>
        </div>
    </div>

</div>
