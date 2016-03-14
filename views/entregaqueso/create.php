<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Entregaqueso */

$this->title = Yii::t('app', 'Create Entregaqueso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entregaquesos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entregaqueso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
