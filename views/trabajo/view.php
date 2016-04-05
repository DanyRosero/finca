<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Trabajo */

$this->title = $model->tipo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trabajos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modificar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Esta seguro que desea eliminar este trabajo?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
    $CosteTotal = 0;
    $dataCant = app\models\TrabajoEmpleado::findAll(['id_trabajo' => $_GET['id']]);
    foreach ($dataCant as $emp) {
        $CosteEmp = \app\models\Empleado::findAll(['ci' => $emp["ci_empleado"]]);
        foreach ($CosteEmp as $pago) {
            $CosteTotal+=$emp["pago"] * 1.0;
        }
    }
    \Yii::$app->db->createCommand("UPDATE trabajo SET coste =" . $CosteTotal . " WHERE id=" . (int) $model->id)->execute();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tipo',
            'duracion_dias',
            'fecha_inicio',
            'fecha_fin',
            [
                'label' => 'Ubicacion',
                'value' => $model->idUbicacion->nombre,
            ],
            'coste',
        ],
    ]) ?>

    <h2>Empleados Participantes</h2>

    <?php
    $datap = new ArrayDataProvider([
        'allModels' => \app\models\Empleado::findAll($model->empleadoList)
    ]);
//    Material::findOne(['id_construccion' => $modelo1, 'id_material' => $modelo->id_material])
    $id_tr = $model->id;
    $modelo = $datap->getModels();
    //print_r($datat);
    echo GridView::widget([
        'dataProvider' => $datap,
        'columns' => [
            'apellidos',
            'nombre',
            'salario',
            [
                'attribute' => 'Pago',
                'format' => 'raw',
                'value' => function ($model) {
                    $cant = app\models\TrabajoEmpleado::findOne(['id_trabajo' => $_GET['id'], 'ci_empleado' => $model->ci]);    //Verificar
                    return $cant["pago"];
                },
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'headerOptions' => ['width' => '15%', 'class' => 'empleado',], // Verify
                        'contentOptions' => ['class' => 'padding-left-5px'],
                        'buttons' => [
                            'view' => function ($url, $modelo, $key) {/* aqui he agregado para q en cada fila haya la accion del modal */
                    $cant = app\models\TrabajoEmpleado::findOne(['id_trabajo' => $_GET['id'], 'ci_empleado' => $modelo->ci]);   // Verify
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                            'id' => 'empleado', /* identificador del modal */
                                            'title' => Yii::t('yii', 'View'),
                                            'data-toggle' => 'modal',
                                            'data-target' => '#activity-modal', /* nombre del modal */
                                            'data-id' => $key,
                                            'data-pjax' => '0',
                                            'onclick' => 'datos("' . $modelo->ci . '","' . $modelo->apellidos . '","' . $modelo->nombre . '",'.$cant["pago"].')',   // Verify
                                ]);
                            },
                                ],
                            ],
                        ]
                    ]);
                    ?>

                    <br />
                    <?php
                    Modal::begin([
                        'id' => 'activity-modal',
                        'header' => '<h4 class="modal-title">Trabajo</h4>',
                        'footer' => '<a href="#" class="btn btn-danger" data-dismiss="modal">Cerrar</a>',
                    ]);
                    $form = ActiveForm::begin([
                                /* identificar el id para hacer cambios en const_material */
                                'action' => 'index.php?r=trabajo%2Fupdate&id=' . $model->id,
                                'method' => 'post',
                    ]);
                    echo $form->field($model, 'id')->textInput(['id' => 'id', 'readonly' => TRUE]);
                    echo $form->field($model, 'tipo')->textInput(['id' => 'tip', 'readonly' => TRUE]);
                    if (isset($modelo[0])) {
                        echo $form->field($modelo[0], 'ci')->textInput(['id' => 'ci_empleado', 'name' => 'ci_empleado', 'readonly' => TRUE]);
                    }
                    ?>
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="empleado-nombre">Nombre:</label>
                                <div class="col-sm-10">
                                    <input id="empleado-nombre" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="empleado-apellidos">Apellidos:</label>
                                <div class="col-sm-10">
                                    <input id="empleado-apellidos" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="pago">Pago:</label>
                                <div class="col-sm-10">
                                    <input id="pago" name="pago" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <br><?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Ingresar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'Boton', 'name' => 'guardar']) ?>
                                </div>
                            </div> 

                        </div>
                    </div>
                    <script>
                        /* dar valor al model dependiente de que material haya seleccionado*/
                        function datos(id, apellidos, nombre, pago) {
                            $("#ci_empleado").val(id);
                            $("#empleado-apellidos").val(apellidos);
                            $("#empleado-nombre").val(nombre);
                            $("#pago").val(pago);
                        }
                    </script>

                    <?php
                    ActiveForm::end();
                    Modal::end();
                    ?>
    
</div>
