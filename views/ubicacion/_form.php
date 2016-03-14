<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicacion-form">

    <?php
        $form = ActiveForm::begin();
        $est = array('Verde' => 'Verde', 'Seco' => 'Seco', 'Fumigado' => 'Fumigado', 'Con malesa' => 'Con malesa', 'Quemado' => 'Quemado', 'Recuperando' => 'Recuperando');
        $fa = array('Rio Grande' => 'Rio Grande', 'Estero mediano' => 'Estero mediano', 'Estero pequeño' => 'Estero pequeño', 'Laguna' => 'Laguna', 'Pozo' => 'Pozo', 'Ninguno' => 'Ninguno');
        $pr = \app\models\Propietario::find()->all();
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Asigne un nombre al potrero']) ?>

    <?= $form->field($model, 'dimension')->textInput(['placeholder' => 'Ingrese la dimension en hectareas']) ?>

    <?= $form->field($model, 'estado')->dropDownList($est, ['prompt' => '--Seleccione Estado--']) ?>

    <?= $form->field($model, 'fuente_agua')->dropDownList($fa, ['prompt' => '--Seleccione fuente de agua--']) ?>

    <?= $form->field($model, 'id_propietario')->dropDownList(yii\helpers\ArrayHelper::map($pr, 'id', 'nombre'), ['prompt' => '--Seleccione Propietario--']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
