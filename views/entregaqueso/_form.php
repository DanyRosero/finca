<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entregaqueso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregaqueso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'peso_finca')->textInput() ?>

    <?= $form->field($model, 'peso_entrega')->textInput() ?>

    <?= $form->field($model, 'precio_libra')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput() ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
