<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Bovinos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bovinos-form">

    <?php
        $form = ActiveForm::begin();
    ?>

    <?= $form->field($model, 'propietario')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Propietario::find()->all(), 'id', 'nombre'), ['id' => 'propi','prompt' => '--Seleccioe Propietario--']) ?>
<!--    <script type="text/javascript">
        function pr(){
            var x = $("#propi").val();
            window.alert('Value = ' + x);
            //return x;
        }
    </script>-->
    
    <?= $form->field($model, 'color')->textInput(['maxlength' => true, 'placeholder' => 'Detalle color del bovino']) ?>
    
    <?= $form->field($model, 'sexo')->dropDownList(array('Macho' => 'Macho', 'Hembra' => 'Hembra'), ['prompt' => '--Seleccione sexo del bovino--']) ?>

    <?= $form->field($model, 'nacimiento')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Seleccione fecha de nacimiento...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'yyyy-mm-dd',
            'startView' => 'year',
        ]
    ]) ?>

    <?= $form->field($model, 'raza')->textInput(['maxlength' => true, 'placeholder' => 'Detalle la raza del bovino']) ?>

    <?= $form->field($model, 'cachos_detalle')->textInput(['maxlength' => true, 'placeholder' => 'Detalle cachos del bovino']) ?>

    <?= $form->field($model, 'id_madre')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Bovinos::find()->all(), 'id', 'color'), ['prompt' => '--Selelccione Madre--']) ?>

    <?= $form->field($model, 'id_grupo')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Grupos::find()->all(), 'id', 'nombre'), ['prompt' => '--Selelccione Grupo--']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Agregar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
