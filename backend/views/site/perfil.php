<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
?>

<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif;?>
</div>
<div class="col-lg-12">
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
</div>

<?php
$form = ActiveForm::begin([
    'id' => 'user-update-form',
    'enableClientValidation' => false,
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_LARGE],
    'options' => ['enctype' => 'multipart/form-data']
]);
$imagen = ($perfil->foto) ? $perfil->foto : 'usuario.jpg';
$pathImagen = Yii::getAlias('@web') . "/img/usuarios/" . $imagen;
?>
<div class="perfil-box login-box-body">
    <h3 class="login-box-msg">Perfil de Usuario</h3>
    <div class="row">
        <div class="col-lg-4">
            <div class="row text-center">
                <img src="<?= $pathImagen ?>" class="img-circle" alt="User Image" width="200px;" style="border: 1px solid #000"/>
                <hr>
            </div>
            <div class="row">
                <?php
                echo $form->field($perfil, 'foto')->widget(FileInput::classname(), [
                    'options' => ['multiple' => true, 'accept' => 'image/*'],
                    'pluginOptions' => [
                        'previewFileType' => 'image',
                        'initialPreview' => [
//                            ($model->imagenPromo) ? Html::img(Yii::getAlias('@imgUpload') . "/promociones/" . $model->imagenPromo, ['class' => 'file-preview-image', 'alt' => $model->imagenPromo, 'title' => $model->imagenPromo, 'width' => '300px']) : NULL,
                        ],
                        'showUpload' => false,
                    ]
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-8">
            <?= $form->field($user, 'username')->textInput(['placeholder' => 'User name', 'disabled' => 'true']) ?>
            <?= $form->field($user, 'email')->textInput(['placeholder' => 'User name', 'disabled' => 'true']) ?>
            <?= $form->field($perfil, 'nombres') ?>
            <?= $form->field($perfil, 'telefono') ?>
            <?= $form->field($perfil, 'celular') ?>
            <div class="row">
                <div class="col-lg-offset-3 col-lg-9">

                    <?php
                    //                    if ($perfil->contaBodegaDestinos) {
                    //                        $bodegas = explode(',', $perfil->contaBodegaDestinos);
                    //                        echo "<ul><b>Bodegas Asignadas:</b>";
                    //                        foreach ($bodegas as $bodega) {
                    //                            $bodegaDestino = backend\modules\transferencia\models\ContaBodegaDestino::findOne($bodega);
                    //                            echo "<li>$bodegaDestino->nombre</li>";
                    //                        }
                    //                        echo "</ul>";
                    //                    } else {
                    //                        echo "<p class='text-center text-danger'>No tienen bodegas asignadas</p>";
                    //                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-offset-10 col-lg-2">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
