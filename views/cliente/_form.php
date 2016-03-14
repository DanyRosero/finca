<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_apellido')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese nombre y apellido del cliente']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese telefono fijo (opcional)']) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese telefono celular']) ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true, 'placeholder' => 'Describa el producto que compra']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
