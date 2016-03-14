<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ci')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese cedula de identidad']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese un nombre']) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese ambos apellidos']) ?>
    
    <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione fecha de nacimiento...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            //'todayBtn' => true,
            'format' => 'yyyy-mm-dd',
            'startView' => 'decade',
        ]
    ]) ?>

    <?= $form->field($model, 'fecha_contrato')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione fecha de contrato...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'yyyy-mm-dd',
            'startView' => 'month',
        ]
    ]) ?>

    <?= $form->field($model, 'salario')->textInput(['placeholder' => 'Ingrese el salario percibido']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
