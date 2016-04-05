<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;;
use app\models\Empleado;
use kartik\field\FieldRange;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;

date_default_timezone_set('America/Guayaquil');
/* @var $this yii\web\View */
/* @var $model app\models\Trabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trabajo-form">

    <?php
        $form = ActiveForm::begin();
        $t = array(
            'Alambrada' => 'Alambrada',
            'Portillo' => 'Portillo',
            'Desbrote' => 'Desbrote',
            'Fumigacion' => 'Fumigacion',
            'Vacunacion' => 'Vacunacion',
            'Herrage' => 'Herrage',
            'Aserrio' => 'Aserrio',
            'Cosecha' => 'Cosecha',
            'Poda' => 'Poda',
            'Siembra' => 'Siembra',
            'Construccion' => 'Construccion'
            );
    ?>

    <?= $form->field($model, 'tipo')->dropDownList($t, ['prompt' => '--Seleccione Tipo de Trabajo--']) ?>

    <?= $form->field($model, 'duracion_dias')->textInput(['placeholder' => 'Ingrese el total de dias del trabajo']) ?>

    <?php
    echo '<label class="control-label">Seleccione laxo de tiempo</label>';
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'fecha_inicio',
        'attribute2' => 'fecha_fin',
        'options' => ['placeholder' => 'Inicio trabajo'],
        'options2' => ['placeholder' => 'Fin trabajo'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
            'todayHighlight' => TRUE,
            'todayBtn' => TRUE,
        ]
    ]);

    ?>
    <br>
    <?= $form->field($model, 'id_ubicacion')->dropDownList(yii\helpers\ArrayHelper::map(app\models\Ubicacion::find()->all(), 'id', 'nombre'), ['prompt' => '--Seleccione Ubicacion--']) ?>

    <?php
        $em = Empleado::find()->all();
        $emple = \yii\helpers\ArrayHelper::map($em, 'ci', 'apellidos');
        if(isset($_GET['id'])){
             echo $form->field($model, 'empleado')->checkboxList($emple, [
            'item' =>
            function ($index, $label, $name, $checked, $value) {
                $datap = new \yii\data\ArrayDataProvider([
                    'allModels' => \app\models\TrabajoEmpleado::findAll(["id_trabajo" => $_GET['id']])
                ]);
    //    Material::findOne(['id_construccion' => $modelo1, 'id_material' => $modelo->id_material])
                $modeloSeleccionados = $datap->getModels();
                $check = " ";
                         foreach ($modeloSeleccionados as $listSelected) {
                            if ($listSelected["ci_empleado"] == $value) {
                              $check = "checked";
                              break;
                            }
                    }
                return '<input type="checkbox" name="Trabajo[empleado][]" value=' .$value . ' ' . $check . '/>' . $label . '
                                        <br>';
            }]);
        }else{
        echo $form->field($model, 'empleado')->checkboxList($emple);
        }
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
