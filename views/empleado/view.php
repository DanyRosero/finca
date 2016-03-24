<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::button('Modificar', ['value' => Url::to('index.php?r=empleado%2Fupdate&id='.$model->ci),'class' => 'btn btn-primary', 'id' => 'eub']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->ci], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Esta seguro que desea eliminar este empleado?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        Modal::begin([
            'header' => '<h3>Modificar Empleado</h3>',
            'id' => 'eum',
            'size' => 'modal-lg',
        ]);
        echo "<div id='euc'></div>";
        Modal::end();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ci',
            'nombre',
            'apellidos',
            'fecha_nacimiento',
            'fecha_contrato',
            'salario',
        ],
    ]) ?>

</div>
