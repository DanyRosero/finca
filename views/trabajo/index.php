<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\TrabajoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Trabajos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trabajo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        // echo $this->render('_search', ['model' => $searchModel]);
        $model = app\models\Trabajo::find()->all();
    ?>

    <p>
        <?= Html::a(Yii::t('app', 'Ingresar Trabajo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tipo',
            //'duracion_dias',
            'fecha_inicio',
            'fecha_fin',
             

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
