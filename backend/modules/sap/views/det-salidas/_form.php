<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetSalidas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="det-salidas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cab_id')->textInput() ?>

    <?= $form->field($model, 'coditem')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bodega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'unidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidadfiscaliza')->textInput() ?>

    <?= $form->field($model, 'diferencia')->textInput() ?>

    <?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
