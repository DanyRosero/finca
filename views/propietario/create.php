<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Propietario */

$this->title = Yii::t('app', 'Create Propietario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Propietarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propietario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
