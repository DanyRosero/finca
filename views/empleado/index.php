<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Empleado', ['value' => Url::to(['/empleado/create']),'class' => 'btn btn-success', 'id' => 'ecb']) ?>
    </p>

    <?php
        Modal::begin([
            'header' => '<h3>Crear Empleado</h3>',
            'id' => 'ecm',
            'size' => 'modal-lg',
        ]);
        echo "<div id='ecc'></div>";
        Modal::end();
    ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        //    ['class' => 'yii\grid\SerialColumn'],

            'ci',
            'nombre',
            'apellidos',
            //'fecha_nacimiento',
            'fecha_contrato',
            'salario',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{delete}'],
        ],
    ]); ?>

</div>
