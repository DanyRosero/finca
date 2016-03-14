<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Search\BovinosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'propietario') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'nacimiento') ?>

    <?php // echo $form->field($model, 'raza') ?>

    <?php // echo $form->field($model, 'cachos_detalle') ?>

    <?php // echo $form->field($model, 'id_madre') ?>

    <?php // echo $form->field($model, 'id_grupo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
