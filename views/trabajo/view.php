<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tipo',
            'duracion_dias',
            'costo',
            'fecha_inicio',
            'fecha_fin',
            [
                'label' => 'Ubicacion',
                'value' => $model->idUbicacion->nombre,
            ]
        ],
    ]) ?>

    <h2>Empleados Responsables</h2>
    <?php
        foreach ($model->empleadoList as $empSelec) {
            echo '<li>'.$empSelec['apellidos'] . '</li>' . '<br>';
        }
    ?>
    
</div>
