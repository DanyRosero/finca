<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\BovinosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bovinos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bovinos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bovinos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'propietario',
            'color',
            'sexo',
            'nacimiento',
            // 'raza',
            // 'cachos_detalle',
            // 'id_madre',
            // 'id_grupo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
