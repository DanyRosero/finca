<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Entregaqueso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entregaqueso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'peso_finca')->textInput() ?>

    <?= $form->field($model, 'peso_entrega')->textInput() ?>

    <?= $form->field($model, 'precio_libra')->widget(MaskMoney::className(), [
        'pluginOptions' => [
            'prefix' => '$',
            'allowNegative' => FALSE,
        ],
    ]) ?>

    <?= $form->field($model, 'fecha_entrega')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Fecha de entrega...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'todayHighlight' => TRUE,
            'todayBtn' => TRUE,
        ]
    ]); ?>

    <?= $form->field($model, 'id_cliente')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Cliente::find()->all(), 'id', 'nombre_apellido'), ['prompt' => '--Seleccione cliente--']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
