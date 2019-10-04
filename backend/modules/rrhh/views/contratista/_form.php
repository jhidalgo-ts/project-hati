<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Contratista */
/* @var $form yii\widgets\ActiveForm */


$quincena = array(1 => 'Activo', 0 => 'Inactivo');
?>

<div class="contratista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numid')->textInput() ?>

    <?= $form->field($model, 'razonsocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'replegal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'formapago')->dropDownList(Yii::$app->params['formaPago'])?>

    <?= $form->field($model, 'numcuenta')->textInput() ?>

    <?= $form->field($model, 'pagquincenal')->dropDownList($quincena)?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
