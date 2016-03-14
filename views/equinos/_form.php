<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Equinos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equinos-form">

    <?php
        $form = ActiveForm::begin();
        $sx = array('Macho' => 'Macho', 'Hembra' => 'Hembra');
        $tipo = array('Carga' => 'Carga', 'Vaqueria' => 'Vaqueria', 'Paseo' => 'Paseo', 'Todo' => 'Todo', 'Ninguno' => 'Ninguno');
    ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese nombre del equino']) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true, 'placeholder' => 'Detalle el color del equino']) ?>

    <?= $form->field($model, 'sexo')->dropDownList($sx, ['prompt' => '--Seleccione sexo del equino--']) ?>

    <?= $form->field($model, 'tipo')->dropDownList($tipo, ['prompt' => '--Seleccione Tipo--'])?>

    <?= $form->field($model, 'nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione fecha de nacimiento...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            //'todayBtn' => true,
            'format' => 'yyyy-mm-dd',
            'startView' => 'year',
        ]
    ]) ?>

    <?= $form->field($model, 'id_grupo')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Grupos::find()->all(), 'id', 'nombre'), ['prompt' => '--Seleccione Grupo--'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
