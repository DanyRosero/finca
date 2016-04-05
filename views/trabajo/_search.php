<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Search\TrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'duracion_dias') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'id_ubicacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Limpiar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
