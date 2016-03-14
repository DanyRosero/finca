<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ventaganado */

$this->title = Yii::t('app', 'Create Ventaganado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventaganados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventaganado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
