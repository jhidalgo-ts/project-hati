<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CabSalidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cab-salidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'docnum')->textInput() ?>

    <?= $form->field($model, 'salidanum')->textInput() ?>

    <?= $form->field($model, 'tiposalida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechadocumento')->textInput() ?>

    <?= $form->field($model, 'solicita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aprueba')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'retira')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
