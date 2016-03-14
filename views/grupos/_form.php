<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grupos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupos-form">

    <?php
        $form = ActiveForm::begin();
        $ub = yii\helpers\ArrayHelper::map(app\models\Ubicacion::find()->all(), 'id', 'nombre');
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre del grupo']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true, 'placeholder' => 'Detalles del grupo']) ?>

    <?= $form->field($model, 'id_ubicacion')->dropDownList($ub, ['prompt' => '--Seleccione Ubicacion--']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
