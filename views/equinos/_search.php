<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Search\EquinosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equinos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'color') ?>

    <?= $form->field($model, 'sexo') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'nacimiento') ?>

    <?php // echo $form->field($model, 'id_grupo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
